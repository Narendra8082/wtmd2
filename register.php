<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "studentportfolio");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Register user
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Store password as plain text

    // Check if the username is unique
    $query = "SELECT username FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Insert the new user into the database
        $insert_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $insert_stmt = $mysqli->prepare($insert_query);
        $insert_stmt->bind_param('sss', $username, $email, $password);

        if ($insert_stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Registration failed. Please try again.";
        }
    }

    $stmt->close();
    $insert_stmt->close();
}

$mysqli->close();
?>
