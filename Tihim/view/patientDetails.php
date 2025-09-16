<?php
    session_start();
    $patient = $_SESSION['patientData'];
?>
<html>
    <head>
        <title>Patient Details</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f4f4f4;
            }
            h2 {
                color: #333;
            }
            .details {
                background: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                max-width: 600px;
            }
            .details p {
                margin: 10px 0;
            }
            a {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 15px;
                background: #007BFF;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
            }
            a:hover {
                background: #0056b3;
            }
            .card {
                background: #2c3e50;
                color: #fff;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            .card h3 {
                margin-bottom: 15px;
            }
            .card a {
                display: inline-block;
                margin-top: 10px;
                padding: 10px 15px;
                background: #34495e;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
            }

            .card a:hover {
                background: #1abc9c;
            }
        </style>
    </head>

    <body>
        <h2>Patient Details</h2>
        <div class="details">
            <p><strong>Name:</strong> <?php echo $patient['name']; ?></p>
            <p><strong>Age:</strong> <?php echo $patient['age']; ?></p>
            <p><strong>Gender:</strong> <?php echo $patient['gender']; ?></p>
            <p><strong>Contact Number:</strong> <?php echo $patient['number']; ?></p>
            <p><strong>Email:</strong> <?php echo $patient['email']; ?></p>
            <p><strong>Comments:</strong> <?php echo $patient['comment']; ?></p>
            <a href="../controller/allPatientController.php">Back to Patient List</a>
    </body>

</html>