<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["REGDNO"];
    $course = $_POST["course"];
    $certification = $_POST["certification"];

    // Database connection parameters
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "studentportfolio";

    // Create a database connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the courses table
    $sql = "INSERT INTO courses (username, course, certification) VALUES ('$username', '$course', '$certification')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
