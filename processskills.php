<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["REGDNO"];
    $hardSkills = $_POST["hard-skills"];
    $softSkills = $_POST["soft-skills"];

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

    // SQL query to insert data into the skills table
    $sql = "INSERT INTO skills (username, hard_skills, soft_skills) VALUES ('$username', '$hardSkills', '$softSkills')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
