<?php
    session_start();
    require_once '../connection/connection.php';

    // Check if user is logged in
    if (!isset($_SESSION['usernameLogin'])) {
        echo json_encode(['error' => 'User not logged in']);
        exit;
    }

    $username = $_SESSION['usernameLogin'];
    $points = intval($_POST['points']);

    if (!$conn) {
        echo json_encode(['error' => 'Database connection failed']);
        exit;
    }

    // Fetch current points from the database
    $sql_points = "SELECT guessPoints FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql_points);

    if ($stmt === false) {
        echo json_encode(['error' => 'Failed to prepare SQL statement']);
        exit;
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $currentPoints = $result->fetch_assoc()['guessPoints'] ?? 0;
    $stmt->close();

    if ($points <= $currentPoints) {
        echo json_encode(['error' => 'New points are not greater than current points']);
        exit;
    } else {
        // Prepare SQL statement to update user's guessPoints
        $sql_update = "UPDATE users SET guessPoints = ? WHERE username = ?";
        $stmt = $conn->prepare($sql_update);

        if ($stmt === false) {
            echo json_encode(['error' => 'Failed to prepare SQL statement']);
            exit;
        }

        $stmt->bind_param("is", $points, $username);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo json_encode(['success' => 'Points updated successfully']);
            } else {
                echo json_encode(['error' => 'No user found or points unchanged']);
            }
        } else {
            echo json_encode(['error' => 'Failed to update points']);
        }
        $stmt->close();
    }

    $conn->close();
?>
