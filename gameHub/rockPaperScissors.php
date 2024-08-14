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
      <div class="text-center pt-5 m-5 mx-auto"><h1 class="mt-5 pt-5 display-1 ">Comming Soon...</h1></div>
    </main>

    <script>
      function btn(elem){
        elem.lastElementChild.classList.toggle('active');
      }

    </script>
  </body>
</html>