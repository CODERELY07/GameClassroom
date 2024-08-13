<?php
header('Content-Type: application/json');

// Database connection (example)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gameclassroom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed']));
}

// Fetch data
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = ['message' => 'No results found'];
}
$conn->close();

// Return data as JSON
echo json_encode($data);
?>
