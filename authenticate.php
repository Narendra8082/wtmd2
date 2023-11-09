<?php
session_start();

// Database connection
$mysqli = new mysqli("localhost", "root", "", "studentportfolio");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT username, password FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($db_username, $db_password);
        $stmt->fetch();

        if ($password == $db_password) {
            // Password is correct, create a session for the user
            $_SESSION['username'] = $db_username;
//            echo "login succesfully";
            // Redirect to student-login.html
            header("Location: student-login.html?username=" . urlencode($db_username));
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}

$mysqli->close();
?>
