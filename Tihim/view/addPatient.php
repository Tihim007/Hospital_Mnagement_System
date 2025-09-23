<?php
    
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

        <script>
            function validateForm(event) {
                let name = document.getElementById("name").value.trim();
                let age = document.getElementById("age").value.trim();
                let number = document.getElementById("number").value.trim();
                let email = document.getElementById("email").value.trim();

                // Name validation
                if (name.length < 3) {
                    alert("Name must be at least 3 characters long.");
                    event.preventDefault();
                    return false;
                }

                // Age validation
                if (age <= 0 || age > 120) {
                    alert("Please enter a valid age between 1 and 120.");
                    event.preventDefault();
                    return false;
                }

                // Number validation
                let phonePattern = /^[0-9]{10,15}$/;
                if (!phonePattern.test(number)) {
                    alert("Please enter a valid contact number (10–15 digits).");
                    event.preventDefault();
                    return false;
                }

                // Email validation
                let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if (!emailPattern.test(email)) {
                    alert("Please enter a valid email address.");
                    event.preventDefault();
                    return false;
                }

                return true;
            }
        </script>
    </head>

    <body>
        <h2>Add Patient</h2>
        <form action="../controller/addPatientController.php" method="POST" onsubmit="return validateForm(event)">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="" placeholder="Enter Patient Name" required><br><br>

            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" value="" placeholder="Enter Patient Age" required><br><br>

            <label for="gender">Sex:</label><br>
            <select id="gender" name="gender" required>
                <option value="male" name="male">Male</option>
                <option value="female" name="female">Female</option>
            </select>
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
