<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Student Portfolio</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }

        .background-container {
            position: relative;
            height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.374),rgba(0, 0, 0, 0.374)), url(images/apple-1868496_1920.jpg);
            background-size: 100%;
            background-position: center;
            display: flex; 
            justify-content: center;
            align-items: center;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            
          }
      
          .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
          }
        /* .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }*/

        .btn-container button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            outline: none;
            border: none;
            transition: background-color 0.3s;
            color: white;
            font-weight: 600;
        } 
        .btn-container button:hover
        {
            background-color: #0452a5;
        }
        .nar 
        {
            position: absolute;
            top: 25%;
        }
    </style>
</head>

<body>
    <div class="background-container">
        <div class="nar">
            <h1>Welcome to Student Portfolio</h1>
            
            <div class="btn-container">
                <!-- Student Login Button -->
                <button onclick="location.href='login.php'">Student Login</button>
                
                <!-- Viewer Login Button -->
                <button onclick="location.href='viewer.php'">Viewer Login</button>
            </div>
        </div>
    </div>
</body>
</html>
