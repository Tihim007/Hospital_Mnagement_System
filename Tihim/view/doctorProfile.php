<?php
    session_start();
    if(!isset($_SESSION['doctorId'])){
        header('Location: doctorLogin.php');
        exit();
    }

    $doctor = $_SESSION['doctor'];
?>

<html>
<head>
    <title>Doctor Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
                width: 250px;
                background-color: #2c3e50;
                color: white;
                padding: 20px;
            }
         
        .sidebar h2 {
            text-align: center;
        }

            .sidebar ul {
                list-style-type: none;
                padding: 0;
            }
            .sidebar ul li {
                margin: 15px 0;
            }
            .sidebar ul li a {
                color: white;
                text-decoration: none;
            }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .profile-container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        td:first-child {
            font-weight: bold;
            color: #333;
            width: 200px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn:hover {
            background: #1a242f;
        }
        .change-password {
            margin-top: 20px;
        }
        .change-password h3 {
            margin-bottom: 10px;
            color: #2c3e50;
        }
        .change-password input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .change-password button {
            padding: 10px 20px;
            background: #27ae60;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .change-password button:hover {
            background: #1e8449;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Doctor Dashboard</h2>
            <ul>
                <li><a href="doctorDashboard.php">Home</a></li>
                <li><a href="doctorAppointments.php">Appointments</a></li>
                <li><a href="managePatients.php">Patients</a></li>
                <li><a href="doctorProfile.php">Profile</a></li>
                <li><a href="../controller/doctorLogoutController.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="main-content">
            <div class="profile-container">
                <h2>Doctor Profile</h2>
                <table>
                    <tr>
                        <td>ID</td>
                        <td><?php echo htmlspecialchars($doctor['id']); ?></td>
                    </tr>
                    <tr>
                        <td>Specialization</td>
                        <td><?php echo htmlspecialchars($doctor['specilization']); ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo htmlspecialchars($doctor['doctorName']); ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo htmlspecialchars($doctor['address']); ?></td>
                    </tr>
                    <tr>
                        <td>Consultation Fees</td>
                        <td><?php echo htmlspecialchars($doctor['docFees']); ?></td>
                    </tr>
                    <tr>
                        <td>Contact No.</td>
                        <td><?php echo htmlspecialchars($doctor['contactno']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo htmlspecialchars($doctor['docEmail']); ?></td>
                    </tr>
                </table>

                <div class="change-password">
                    <h3>Change Password</h3>
                    <form method="POST" action="../controller/changePasswordController.php">
                        <input type="password" name="oldPassword" placeholder="Enter Old Password" value="" required>
                        <input type="password" name="newPassword" placeholder="Enter New Password" value="" required>
                        <input type="password" name="confirmPassword" placeholder="Confirm New Password" value="" required>
                        <button type="submit">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
