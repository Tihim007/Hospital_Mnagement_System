<?php
    session_start();
    include_once '../model/doctorModel.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $doctor = getDoctor($email, $password);

    if ($doctor != null) {
        // Successful login
        
        $_SESSION['doctorId'] = $doctor['id'];
        $_SESSION['doctorName'] = $doctor['doctorName'];
        $_SESSION['docImg'] = $doctor['doc_img'];
        $_SESSION['doctor'] = $doctor;
        
        header('Location: ../view/doctorDashboard.php');
        exit();
    } else {
        // Failed login
        echo "<script>alert('Invalid username or password'); window.location.href='../view/doctorLogin.php';</script>";
        exit();
    }

?>