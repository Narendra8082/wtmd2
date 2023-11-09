<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["USERNAME"];
    $regno = $_POST["REGDNO"];
    $email = $_POST["EMAIL"];
    $name = $_POST["NAME"];
    $age = $_POST["AGE"];
    $gender = $_POST["GENDER"];

    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "studentportfolio");
    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the studentdetails table
    $sql = "INSERT INTO studentdetails (username, regno, email, name, age, gender) VALUES ('$username', '$regno', '$email', '$name', '$age', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
