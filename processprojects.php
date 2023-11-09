<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["REGDNO"];
    $projectName = $_POST["project-name"];
    $technologies = $_POST["technologies"];
    $description = $_POST["description"];
    $outcomes = $_POST["outcomes"];
    $projectLink = $_POST["project-link"];

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

    // SQL query to insert data into the projects table
    $sql = "INSERT INTO projects (username, project_name, technologies, description, outcomes, project_link) 
            VALUES ('$username', '$projectName', '$technologies', '$description', '$outcomes', '$projectLink')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
