<?php
    session_start();
    if(!isset($_SESSION['doctorId'])){
        header('Location: doctorLogin.php');
        exit();
    }

    $doctorName = $_SESSION['doctorName'];
    $docImg = $_SESSION['docImg'];
?>

<html>

    <head>
        <title>Doctor Dashboard</title>
        
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .dashboard-container {
                display: flex;
                height: 100vh;
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
                overflow-y: auto;
            }
            .main-content h1 {
                color: #333;
            }
            /* Cards */
            .section {
                margin-top: 30px;
            }
            .card-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 20px;
                margin-top: 15px;
            }
            .card {
                background: #fff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                transition: transform 0.2s ease;
                text-align: center;
            }
            .card:hover {
                transform: translateY(-5px);
            }
            .card h3 {
                margin-bottom: 10px;
                color: #2c3e50;
            }
            .card p {
                font-size: 14px;
                color: #555;
                margin-bottom: 15px;
            }
            .card a {
                display: inline-block;
                padding: 8px 15px;
                background: #2c3e50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-size: 14px;
            }
            .card a:hover {
                background: #1a242f;
            }
        </style>
    </head>
    <body>
        <div class="dashboard-container">
            <div class="sidebar">
                <h2>Doctor Dashboard</h2>
                <ul>
                    <li><a href="doctorDashboard.php">Home</a></li>
                    <li><a href="#">Appointments</a></li>
                    <li><a href="../controller/allPatientController.php">Patients</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="../controller/doctorLogoutController.php">Logout</a></li>
                </ul>
            </div>
            <div class="main-content">
                <h1>Welcome </h1>
                <p>This is your dashboard where you can manage your appointments and patients.</p>

                <!-- My Section -->
                <div class="section">
                    <h2>Dr. <?php echo htmlspecialchars($doctorName); ?></h2>
                    <div class="card-container">
                        <div class="card">
                            <h3>My Profile</h3>
                            <p>View and update your profile details.</p>
                            <a href="doctorProfile.php">Go</a>
                        </div>
                        <div class="card">
                            <h3>My Appointments</h3>
                            <p>Check and manage your scheduled appointments.</p>
                            <a href="../controller/appointmentController.php">Go</a>
                        </div>
                    </div>
                </div>

                <!-- Patient Section -->
                <div class="section">
                    <h2>Patient Section</h2>
                    <div class="card-container">
                        <div class="card">
                            <h3>Add Patient</h3>
                            <p>Register a new patient into the system.</p>
                            <a href="addPatient.php">Go</a>
                        </div>
                        <div class="card">
                            <h3>Manage Patients</h3>
                            <p>View and update patient records.</p>
                            <a href="../controller/allPatientController.php">Go</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
