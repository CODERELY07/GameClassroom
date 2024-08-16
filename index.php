<?php
    session_start();
    require_once 'unsetSession.php';
    require_once 'isLogin.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Game Classroom</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
  </head>
  <body>
    <main class="container py-5">

        <h1 class="jumbotron p-4 text-center display-3">Welcome to Game Classroom!</h1>
        <p>Get ready for a thrilling test of luck and strategy in Classroom, the ultimate guessing game where your skills with numbers and dice rolls will determine your success. In this game, it's not just about what you know, but how you play your cards right!</p>

        <div class="mt-5"> 
            <h3 class="display-5 mb-4">How It Works:</h3>
            <ol>
                <li>
                    <p><strong>Guess the Number: </strong> Each round, you'll be presented with a number that you need to guess. Make your best prediction based on the clues and hints provided.</strong></p>
                    
                </li>
                <li>
                    <p><strong>Rock, Paper, Scissors: </strong>The excitement doesn’t stop at just guessing! Play Rock, Paper, Scissors to add an extra layer of chance and strategy. Your choice could impact the outcome of your guess, making each turn uniquely unpredictable.</p>
                    
                </li>
                <li>
                    <p><strong>GEarn Points: </strong> Correct guesses and successful dice rolls will earn you points. The better your guesses and the luckier your rolls, the more points you'll accumulate.</p>
                    
                </li>
                 <li>
                    <p><strong>Climb the Leaderboards: </strong> Track your progress and see where you stand compared to other players. Our real-time leaderboards showcase the top guessers and luckiest rollers, motivating you to sharpen your skills and aim for the top spot.</p>
                </li>
                <li>
                    <p><strong>Challenge Friends: </strong> Invite friends to join the fun and see who comes out on top. With friendly competition and bragging rights on the line, every roll and guess counts!</p>
                </li>
            </ol>
        </div>
        <div class="mt-5 text-center">
            <h3 class="display-6">Ready to Roll?</h3>
            <p>Dive into Classroom and experience the excitement of guessing and rolling like never before. Compete for the highest scores, claim your spot on the leaderboards, and prove you’ve got what it takes to be the ultimate guessing champion!</p>
            <a href="signup.php">
                <button class="btn primary-btn">Join Now</button>
            </a>
           
        </div>

        <article>
            <h2 class="display-6 mt-5 text-center">Try or Multiplayer Games</h2>
            <div class="line"></div>
            <div class="row mt-5 gy-4">
            <div class="col-md-6">
                <div class="card box">
                <div class="card-body">
                    <h4 class="mb-4 display-6">Dice Dice Roll!</h4>
                    <p><strong>Dice Dice Roll!: </strong> In this multiplayer dice game, players decide how many rounds they want to play at the beginning of the game. During each round, players take turns rolling dice. The player with the highest roll in each round wins that round. The game continues until all chosen rounds have been played. </strong></p>
                    <a href="multiplayer/dice/dice.html">
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
        </article>
    </main>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>