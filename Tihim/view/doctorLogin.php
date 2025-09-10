<?php


?>

<html>
   <head>
      <title>Hospital Management System</title>

        <style>
             body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
             }
             h1 {
                color: #333;
             }
             form {
                max-width: 300px;
                margin: auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
             }
             label {
                display: block;
                margin-bottom: 10px;
             }
             input[type="text"], input[type="password"],input[type="email"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
             }
             input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 3px;
                cursor: pointer;
             }
             input[type="submit"]:hover {
                background-color: #218838;
             }
        </style>

   </head>
   <body>
      
      <form action="../controller/doctorLoginController.php" method="POST">
         <h2 align="center">Doctor Login</h2>
         <label for="email">Email:</label>
         <input type="email" id="email" name="email" value="" placeholder="Enter Your email" required>

         <label for="password">Password:</label>
         <input type="password" id="password" name="password" placeholder="Enter Your Password"  value="" required>

         <input type="submit" value="Login">

         
            <p>
            <a href="selectLogin.php">Back to Login Selection</a>
            </p>
      </form>
   </body>