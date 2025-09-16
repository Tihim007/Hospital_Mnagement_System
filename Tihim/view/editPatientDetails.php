<?php
    session_start();
    $patientData = $_SESSION['patientData'];
?>

<html>
    <head>
        <title>Edit Patient Details</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f4f4f4;
            }
            h2 {
                color: #333;
            }
            form {
                background: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                max-width: 600px;
            }
            label {
                display: block;
                margin-top: 10px;
            }
            input[type="text"], input[type="number"], input[type="email"], select, textarea {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            input[type="submit"] {
                margin-top: 20px;
                padding: 10px 15px;
                background: #28a745;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background: #218838;
            }
        </style>
        <h2>Edit Patient Details</h2>
        <form action="../controller/updatePatientController.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $patientData['id']; ?>">
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $patientData['name']; ?>" required>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo $patientData['age']; ?>" required>
            
            <label for="gender">Sex:</label>
            <select name="gender" id="select">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label for="number">Contact Number:</label>
            <input type="text" id="number" name="number" value="<?php echo $patientData['number']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $patientData['email']; ?>" required>
            <label for="comment">Comment:</label> 
            <textarea id="comment" name="comment" rows="4"><?php echo $patientData['comment']; ?></textarea>
            <input type="submit" value="Update Patient">
        </form>
    </head>
</html>