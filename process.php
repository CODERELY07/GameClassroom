<?php
    session_start();
    require_once 'connection/connection.php';
    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
        // Sanitize input data
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirm-password']);

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['confirmPassword'] = $confirmPassword;
        if(empty($username) || empty($password)){
            $_SESSION['status'] = "Please fill in all fields.";
            header("Location: signup.php");
            exit();
        }else if(strlen($password) < 6){
            $_SESSION['status'] = "Password should be atleast 6 characters";
            header("Location: signup.php");
            exit();
        }else if($password != $confirmPassword){
            $_SESSION['status'] = "Password doesn't Match";
            header("Location: signup.php");
            exit();
        }
        else{
      
        $check_username = "SELECT id FROM users WHERE username = ?";
        $check_stmt = $conn->prepare($check_username);

        if($check_stmt === false){
            die("Prepare failed: " . $conn->error);
        }

        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $check_stmt->store_result();
        if($check_stmt->num_rows > 0){
            $_SESSION['status'] = "Username already exists.";
            header("Location: signup.php");
            exit();
        }else{
            // Prepare an SQL statement to prevent SQL injection
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            // Bind parameters to the SQL query
            $stmt->bind_param("ss", $username, $password);
            // Execute the statement and handle possible errors
            if ($stmt->execute()) {
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                unset($_SESSION['confirmPassword']);
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['status'] = "Can't create username";
                header("Location: signup.php");
                exit();
            }
            // Close the prepared statement
            $stmt->close();
        }
            $check_stmt->close();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        // Sanitize input data
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        if(empty($username) || empty($password)){
            $_SESSION['status'] = "Please fill in all fields.";
            header("Location: signup.php");
            exit();
        }else{
           
            // Prepare an SQL statement to prevent SQL injection
            $sql = "SELECT id FROM users WHERE username = ? && password = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            // Bind parameters to the SQL query
            $stmt->bind_param("ss", $username, $password);
            // Execute the statement and handle possible errors
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                $_SESSION['isLogin'] = true;
                $_SESSION['usernameLogin'] = $username;
                header("Location: gameHub/dashboard.php");
                exit();
            } else {
                $_SESSION['status'] = "No account";
                header("Location: login.php");
                exit();
            }
            // Close the prepared statement
            $stmt->close();
        }
        // Close the database connection
        $conn->close();
    }
       
?>
