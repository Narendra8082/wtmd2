<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["USERNAME"];
    $sscSchool = $_POST["SSC"];
    $plusTwo = $_POST["12"];
    $institution = $_POST["institution"];
    $degree = $_POST["degree"];
    $graduationDate = $_POST["graduation-date"];

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

    // SQL query to insert data into the educational history table
    $sql = "INSERT INTO educationalhistory (username, sscSchool, plusTwo, institution, degree, graduationDate) 
            VALUES ('$username', '$sscSchool', '$plusTwo', '$institution', '$degree', '$graduationDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
