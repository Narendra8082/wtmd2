<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
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
    </style>
</head>
<body>
    <div class="container">
        <?php
            // Database connection parameters
            $jdbcUrl = "jdbc:mysql://localhost:3306/studentportfolio";
            $dbUser = "root";
            $dbPassword = "root";

            $conn = null;

            try {
                // Establish database connection
                $conn = new mysqli("localhost", "root", "", "studentportfolio");

                // Get the username from the URL parameter
                $username = $_GET['username'];

                // Query to fetch data from studentdetails
                $queryStudentDetails = "SELECT * FROM studentdetails WHERE username = '$username'";
                $resultStudentDetails = $conn->query($queryStudentDetails);

                // Query to fetch data from aboutme
                $queryAboutMe = "SELECT * FROM aboutme WHERE username = '$username'";
                $resultAboutMe = $conn->query($queryAboutMe);

                // Query to fetch data from educationalhistory
                $queryEducationalHistory = "SELECT * FROM educationalhistory WHERE username = '$username'";
                $resultEducationalHistory = $conn->query($queryEducationalHistory);

                // Query to fetch data from projects
                $queryProjects = "SELECT * FROM projects WHERE username = '$username'";
                $resultProjects = $conn->query($queryProjects);

                // Query to fetch data from courses
                $queryCourses = "SELECT * FROM courses WHERE username = '$username'";
                $resultCourses = $conn->query($queryCourses);

                // Query to fetch data from skills
                $querySkills = "SELECT * FROM skills WHERE username = '$username'";
                $resultSkills = $conn->query($querySkills);

                // Display data from studentdetails
                if ($rowStudentDetails = $resultStudentDetails->fetch_assoc()) {
                    echo "<h1>Student Details</h1>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Username</th>";
                    echo "<th>Registration Number</th>";
                    echo "<th>Email</th>";
                    echo "<th>Name</th>";
                    echo "<th>Age</th>";
                    echo "<th>Gender</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $rowStudentDetails["username"] . "</td>";
                    echo "<td>" . $rowStudentDetails["regno"] . "</td>";
                    echo "<td>" . $rowStudentDetails["email"] . "</td>";
                    echo "<td>" . $rowStudentDetails["name"] . "</td>";
                    echo "<td>" . $rowStudentDetails["age"] . "</td>";
                    echo "<td>" . $rowStudentDetails["gender"] . "</td>";
                    echo "</tr>";
                    echo "</table>";
                }

                // Display data from aboutme
                if ($rowAboutMe = $resultAboutMe->fetch_assoc()) {
                    echo "<h1>About Me</h1>";
                    echo "<p>Aspirations: " . $rowAboutMe["aspirations"] . "</p>";
                    echo "<p>Interests: " . $rowAboutMe["interests"] . "</p>";
                    echo "<p>Achievements: " . $rowAboutMe["achievements"] . "</p>";
                }

                // Display data from educationalhistory
                if ($rowEducationalHistory = $resultEducationalHistory->fetch_assoc()) {
                    echo "<h1>Educational History</h1>";
                    echo "<p>SSC School: " . $rowEducationalHistory["sscSchool"] . "</p>";
                    echo "<p>Plus Two: " . $rowEducationalHistory["plusTwo"] . "</p>";
                    echo "<p>Institution: " . $rowEducationalHistory["institution"] . "</p>";
                    echo "<p>Degree: " . $rowEducationalHistory["degree"] . "</p>";
                    echo "<p>Graduation Date: " . $rowEducationalHistory["graduationDate"] . "</p>";
                }

                // Display data from projects
                if ($rowProjects = $resultProjects->fetch_assoc()) {
                    echo "<h1>Projects</h1>";
                    do {
                        echo "<p>Project Name: " . $rowProjects["project_name"] . "</p>";
                        echo "<p>Technologies: " . $rowProjects["technologies"] . "</p>";
                        echo "<p>Description: " . $rowProjects["description"] . "</p>";
                        echo "<p>Outcomes: " . $rowProjects["outcomes"] . "</p>";
                        echo "<p>Project Link: " . $rowProjects["project_link"] . "</p>";
                    } while ($rowProjects = $resultProjects->fetch_assoc());
                }

                // Display data from courses
                if ($rowCourses = $resultCourses->fetch_assoc()) {
                    echo "<h1>Courses</h1>";
                    do {
                        echo "<p>Course: " . $rowCourses["course"] . "</p>";
                        echo "<p>Certification: " . $rowCourses["certification"] . "</p>";
                    } while ($rowCourses = $resultCourses->fetch_assoc());
                }

                // Display data from skills
                if ($rowSkills = $resultSkills->fetch_assoc()) {
                    echo "<h1>Skills</h1>";
                    do {
                        echo "<p>Hard Skills: " . $rowSkills["hard_skills"] . "</p>";
                        echo "<p>Soft Skills: " . $rowSkills["soft_skills"] . "</p>";
                    } while ($rowSkills = $resultSkills->fetch_assoc());
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
    </div>
</body>
</html>
