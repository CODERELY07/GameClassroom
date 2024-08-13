<?php
    session_start();
    require_once '../unsetSession.php';
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
  <body class="bg-white">
    <header class="gameHubHeader bg-dark text-white">
        <div class="dashboard">
          <h3 class="display-5 pointer">GameHub</h3>
        </div>
        <div class="profile">
          <div class="profile_pic pointer">
            
          </div>
          <a href="../logout.php">
            <button class="btn btn-danger">Logout</button>
          </a>
        </div>
    </header>
    <main class="container">
      <div class="text-center pt-5 m-5 mx-auto"><h1 class="mt-5 pt-5 display-1 ">Comming Soon...</h1></div>
    </main>
  </body>
</html>