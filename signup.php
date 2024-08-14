<?php
    session_start();
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
  <body>
    <div class="container mt-5 pt-5">
        <h1 class="text-center VT323 mt-5 display-3 ">Game ClassRoom</h1>
        <div class="login-container card my-5 d-block mx-auto cards py-5 p-4">
            <div class="card-header border-0 bg-white">
                <h5 class="text-center ">Sign Up It's Free</h5>
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
                <form action="process.php" class="px-5" method="POST">
                    <div class="inputfields py-2">
                        <label for="username" class="form-label b">Username</label>
                        <br>
                        <input type="text" class="w-100 rounded p-2 form-control" name="username" id="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''?>"  placeholder="Player Username">
                    </div>
                    <div class="inputfields py-2">
                        <label class="form-label" for="password">Password</label>
                        <br>
                        <input type="password" class="w-100 rounded p-2 form-control b" name="password" id="password" value="<?php echo htmlspecialchars(isset($_SESSION['password']) ? $_SESSION['password'] : ''); ?>"  placeholder="Player Password">
                    </div>
                    <div class="inputfields py-2">
                        <label class="form-label" for="confirm-password">Confirm Password</label>
                        <br>
                        <input type="password" class="w-100 rounded p-2 form-control b" name="confirm-password" id="confirm-password"   placeholder="Player Confirm Password" value="<?php echo isset($_SESSION['confirmPassword']) ? $_SESSION['confirmPassword'] : ''?>">
                    </div>
                    <button type="submit" name="signup" class="btn primary-btn d-block mx-auto mt-5">
                        Sign Up
                    </button>
                </form>
            </div>
            <p class="text-center text-secondary">Already Have an Account? <a href="login.php">Login</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
