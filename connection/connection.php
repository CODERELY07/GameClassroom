<?php
    define("SERVER_NAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DB_NAME", "gameclassroom");

    // Establish connection to the database
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    // Check connection and handle errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>