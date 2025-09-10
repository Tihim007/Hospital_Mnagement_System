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
             ul {
                list-style-type: none;
                padding: 0;
             }
             li {
                margin: 10px 0;
             }
             a {
                text-decoration: none;
                color: #007BFF;
             }
             a:hover {
                text-decoration: underline;
             }
        </style>

   </head>
   <body>
      <h1>Welcome to Hospital Management System</h1>
      <p>Please select your login type:</p>
      <ul>
         <li><a href="selectLogin.php">Patient Login</a></li> <!-- Changed link to patient login address -->
         <li><a href="doctorLogin.php">Doctor Login</a></li>
         <li><a href="../../Rudro/view/auth/login.php">Admin Login</a></li>
      </ul>
   </body>

</html>