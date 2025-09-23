<?php

?>

<html>
   <head>
      <title>Hospital Management System</title>

      <style>
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(120deg, #e3f2fd, #ffffff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
         }

         .container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
            width: 350px;
         }

         h1 {
            color: #0d47a1;
            margin-bottom: 15px;
            font-size: 26px;
         }

         p {
            font-size: 16px;
            color: #555;
            margin-bottom: 25px;
         }

         ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 15px;
         }

         li {
            margin: 0;
         }

         a {
            display: block;
            padding: 12px;
            border-radius: 10px;
            background: #1976d2;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-align: center;
            letter-spacing: 0.5px;
         }

         a:hover {
            background: #0d47a1;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
         }
      </style>

   </head>
   <body>
      <div class="container">
         <h1>Welcome to Hospital Management System</h1>
         <p>Please select your login type:</p>
         <ul>
            <li><a href="selectLogin.php">Patient Login</a></li>
            <li><a href="doctorLogin.php">Doctor Login</a></li>
            <li><a href="../../Rudro/view/auth/login.php">Admin Login</a></li>
         </ul>
      </div>
   </body>
</html>
