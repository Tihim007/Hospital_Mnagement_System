<?php
    session_start();
    if(!isset($_SESSION['doctorId'])){
        header('Location: doctorLogin.php');
        exit();
    }

    $appointments = $_SESSION['apHistory'];
?>

<html>
<head>
    <title>View Appointments</title>
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
            color: #fff;
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
        h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #2c3e50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
                <li><a href="viewAppointments.php">Appointments</a></li>
                <li><a href="managePatients.php">Patients</a></li>
                <li><a href="doctorProfile.php">Profile</a></li>
                <li><a href="../controller/doctorLogoutController.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>Appointments</h2>

            <?php if(count($appointments) > 0): ?>
                <table>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Specialization</th>
                        <th>Doctor ID</th>
                        <th>Patient ID</th>
                        <th>Consultancy Fees</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                    <?php foreach($appointments as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['doctorSpecilization']); ?></td>
                            <td><?php echo htmlspecialchars($row['doctorId']); ?></td>
                            <td><?php echo htmlspecialchars($row['userId']); ?></td>
                            <td><?php echo htmlspecialchars($row['consultancyFees']); ?></td>
                            <td><?php echo htmlspecialchars($row['appointmentDate']); ?></td>
                            <td><?php echo htmlspecialchars($row['appointmentTime']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <div class="no-data">No appointments found.</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
