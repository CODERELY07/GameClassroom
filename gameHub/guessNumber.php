<?php
    session_start();

    if(!isset($_SESSION['isLogin'])){
      header('location:../index.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Game Classroom</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
      #guessNumber input{
        width: 100%;
        max-width:200px;
        padding:5px;
        display:block;
      }
    </style>
  </head>
  <body class="bg-danger">
    <div id="guessNumber" class="container my-5">
   
        <div class="card">
        <p class="mx-auto mt-4 display-6">Player: <?php echo $_SESSION['username']?></p>
        <p class="px-5 mt-5">Points: <span id='pointsResult'></span></p> 
        <p class="px-5">Remaining Attempts: <span id='attemptsResult'></span></p>
          <div class="d-flex justify-content-center card-body flex-column align-items-center gap-3 m-4">
            <p>Note: You only have 5 attempts each guessess</p>
            <p id="guessGeneratorResult"></p>
            <input type="text" id="guessNumberInput">
            <div>
            <button id="guessNumberBtn" class="btn btn-success">Guess</button>
            <button id="restart" class="btn btn-primary">Restart</button>
            </div>
          
          </div>
        </div>
      </div>
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="display-6">Leaderbords</h3>
            </div>
            <div class="card-body">
              <table class="table table-stripped" id="leaderboards">
                <tr>
                  <th>Rank</th>
                  <th>Username</th>
                  <th>Points</th>
                </tr>
              </table>
            </div>
        </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>

    let guessGeneratorResult = document.getElementById('guessGeneratorResult');
    let guessNumberInput = document.getElementById('guessNumberInput');
    let guessNumberBtn = document.getElementById('guessNumberBtn');
    let pointsResult = document.getElementById('pointsResult');
    let attemptsResult = document.getElementById('attemptsResult');
    const leaderboards = document.getElementById('leaderboards');
    const restart = document.getElementById('restart');

    let guessAttempt = 5;
    let points = 0;
    let minNumber, maxNumber, correctNumber;

    function generateNumber(min, max) {
      return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function minNumberGenerator() {
      let min = 1;
      let max = 10;
      return generateNumber(min, max);
    }

    function maxNumberGenerator() {
      let min = 10;
      let max = 20;
      return generateNumber(min, max);
    }

    function startNewGame() {
      minNumber = minNumberGenerator();
      maxNumber = maxNumberGenerator();
      correctNumber = generateNumber(minNumber, maxNumber);
      guessAttempt = 5;
      displayQuestion();
    }

    function displayQuestion() {
      if (guessAttempt <= 0) {
        guessGeneratorResult.innerHTML = "Game Over";
        attemptsResult.innerHTML = 0;
        guessNumberInput.value = "";
        guessNumberBtn.disabled = true; // Disable button after game over
        savePoints(points);
        Swal.fire({
          title: "Game Over",
          text: `The correct number was ${correctNumber}. Your Points: ${points}`,
          icon: "error"
        });
        displayLeaderboards();
        return; // Exit function
      }

      guessGeneratorResult.innerHTML = `Guess the number from ${minNumber} to ${maxNumber}`;
      guessNumberInput.value = "";
      pointsResult.innerHTML = points;
      attemptsResult.innerHTML = guessAttempt;
    }

    guessNumberBtn.onclick = function() {
      if (guessAttempt <= 0) return; // Prevent interaction if game is over

      const userGuess = Number(guessNumberInput.value);
      if (userGuess < minNumber || userGuess > maxNumber) {
        guessGeneratorResult.innerHTML = `The number should be between ${minNumber} and ${maxNumber}`;
        setTimeout(displayQuestion, 1000);
      } else {
        if (userGuess === correctNumber) {
          points += 20;
          guessGeneratorResult.innerHTML = `You guessed it! The number was ${correctNumber}`;
          setTimeout(startNewGame, 1000); // Start new game after a correct guess
        } else {
          guessAttempt--;
          guessGeneratorResult.innerHTML = userGuess < correctNumber ? "Your guess is too low" : "Your guess is too high";
          setTimeout(displayQuestion, 1000);
        }
      }
    };

    restart.onclick = function() {
      if (confirm("Are you sure you want to restart the game?")) {
        points = 0;
        guessNumberBtn.disabled = false; // Re-enable the button if it was disabled
        displayLeaderboards();
        startNewGame();
      }
    };

    async function savePoints(points) {
      try {
        const response = await fetch('save_points.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({
            'points': points
          })
        });

        const result = await response.json();
        if (response.ok) {
          if (result.success) {
            console.log(result.success);
          } else if (result.error) {
            console.log(result.error);
          } else {
            console.log("Network Error.");
          }
        }
      } catch (error) {
        console.error("Error: ", error);
      }
    }

    async function displayLeaderboards() {
      try {
        const response = await fetch('process.php');
        const data = await response.json();
        if (!response.ok) {
          throw new Error("Network Error.");
        }

        leaderboards.innerHTML = ""; // Clear existing data
        if (data.error) {
          leaderboards.innerHTML = `<tr><td>${data.error}</td></tr>`;
        } else if (data.message) {
          leaderboards.innerHTML = `<tr><td>${data.message}</td></tr>`;
        } else {
          leaderboards.innerHTML = data.map((item, index) =>
            `<tr>
              <td>${index + 1}</td>
              <td>${item.username}</td>
              <td>${item.guessPoints}</td>
            </tr>`
          ).join("");
        }
      } catch (error) {
        leaderboards.innerHTML = `<p class="text-center display-6 mt-5">No one is on the board!</p>`;
      }
    }

    displayLeaderboards();
    startNewGame(); 

    </script>
  </body>
</html>
