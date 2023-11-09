<!DOCTYPE html>
<html>
<head>
    <title>Viewer Dashboard</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
            background-image: url("images/stdmain.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            text-decoration: none;
            color: #0066cc;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <table border="1">
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Details</th>
            </tr>
        <?php
            // Database connection parameters
            $jdbcUrl = "jdbc:mysql://localhost:3306/studentportfolio";
            $dbUser = "root";
            $dbPassword = "root";

            $conn = null;

            try {
                // Establish database connection
                $conn = new mysqli("localhost", "root", "", "studentportfolio");

                // Query for fetching profiles
                $query = "SELECT username, name FROM studentdetails";
                $result = $conn->query($query);

                // Display profiles with buttons
                while ($row = $result->fetch_assoc()) {
                    $username = $row["username"];
                    $name = $row["name"];

                    echo "<tr>";
                    echo "<td>" . $username . "</td>";
                    echo "<td>" . $name . "</td>";
                    echo '<td><a href="student_details.php?username=' . $username . '">View Details</a></td>';
                    echo "</tr>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } finally {
                // Close resources
                if ($conn !== null) {
                    $conn->close();
                }
            }
        ?>
        </table>
    </div>
</body>
</html>
