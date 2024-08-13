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
    <title>Sign Up | Game Classroom</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  </head>
  <body class="bg-danger">
    <div class="container">
        <div class="card my-5 d-block mx-auto cards">
            <div class="card-header">
                <h3 class="text-center display-4 p-3">Sign Up</h3>
            </div>
            <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
            ?>
            <div class="card-body pt-3 mw-50">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
                unset($_SESSION['status']);
            ?>
                <form action="process.php" class="p-3" method="POST">
                    <div class="inputfields py-2">
                        <label for="username" class="form-label">Username</label>
                        <br>
                        <input type="text" class="w-100 rounded p-2 border-danger" name="username" id="username" placeholder="e.g Juan Dela Cruz">
                    </div>
                    <div class="inputfields py-2">
                        <label class="form-label" for="password">Password</label>
                        <br>
                        <input type="password" class="w-100 rounded p-2 border-danger" name="password" id="password" placeholder="e.g jaundelacruz12345">
                    </div>
                    <button type="submit" name="signup" class="btn btn-danger d-block mx-auto mt-3">
                        Sign Up
                    </button>
                </form>

               <p class="m-5 text-center">Already Have an Account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
