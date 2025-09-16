<?php
    if(!isset($_SESSION['doctor'])) {
        header('Location: doctorLogin.php');
        exit();
    }
?>

<html>

    <head>
        <title>Add Patient</title>
        
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f4f4f4;
            }
            h2 {
                color: #333;
            }
            form {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 500px;
                margin: auto;
            }
            label {
                display: block;
                margin-bottom: 8px;
                color: #555;
            }
            input[type="text"], input[type="number"], input[type="email"], select {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            input[type="submit"] {
                background-color: #28a745;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #218838;
            }
        </style>
    </head>

    <body>
        <h2>Add Patient</h2>
        <form action="../controller/patientController.php" method="GET">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="" placeholder="Enter Patient Name" required><br><br>

            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" value="" placeholder="Enter Patient Age" required><br><br>

            <label for="gender">Sex:</label><br>
            <input type="select" id="gender" name="gender"  required>
                <option value="male" name="male"></option>
                <option value="female" name="female"></option>

            <br><br>

            <label for="number">Contact Number:</label><br>
            <input type="number" id="number" name="number" value="" placeholder="Enter Patient Contact Number" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="" placeholder="Enter Patient Email" required><br><br>

            <label for="comment">Comments:</label><br>
            <input type="text" id="comment" name="comment" value="" placeholder="Enter Medical Details"><br><br>
            <input type="submit" value="Add Patient">
        </form>
    </body>

</html>