<?php
    header("Content-Type: application/json");
    require_once '../connection/connection.php';

    if($conn->connect_error){
        die(json_encode(["error" => "Connection Failed"]));
    }
 
    $sql = "SELECT * FROM users WHERE guessPoints > 0 ORDER BY guessPoints DESC";
    $result = $conn->query($sql);

    $data = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }else{
        $data = ['Message' => "No Result"];
    }
    $conn->close();
    echo json_encode($data);
?>
