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
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <header style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
      <div class="container gameHubHeader">
        <div class="dashboard">
            <a href="dashboard.php" class="text-decoration-none"><h3 class="display-5 pointer text-center VT323">Game Classroom</h3></a>
          </div>
          <div class="profile" onclick='btn(this)'>
            <div class="profile_pic pointer">
              
            </div>
            <ul class="profile-settings">
              <li><a href="leaderboards.php">LeaderBoards</a></li>
              <li><a href="">Settings</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div>
      </div>
       
    </header>
    <main class="container">
        <div class="row mt-5 gy-4">
          <div class="col-md-6">
            <div class="card box">
              <div class="card-body">
                <h4 class="mb-4 display-6">Guessing The Number</h4>
                 <p><strong>Guess the Number: </strong> Each round, you'll be presented with a number that you need to guess. Make your best prediction based on the clues and hints provided.</strong></p>
                <a href="guessNumber.php">
                   <button class="btn primary-btn">Play Now</button>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card box">
              <div class="card-body">
                <h4 class="mb-4 display-6">Rock, Paper, Scissors</h4>
                <p><strong>Rock, Paper, Scissors: </strong>The excitement doesn’t stop at just guessing! Play Rock, Paper, Scissors to add an extra layer of chance and strategy.</p>
                <a href="rockPaperScissors.php">
                   <button class="btn primary-btn">Play Now</button>
                </a>
              </div>
            </div>
          </div>
        </div>
    </main>

    <script>
      function btn(elem){
        elem.lastElementChild.classList.toggle('active');
      }

    </script>
  </body>
</html>