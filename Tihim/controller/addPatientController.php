<?php
    session_start();
    if(!isset($_SESSION['doctor'])) {
        header('Location: doctorLogin.php');
        exit();
    }
    include_once '../model/patientModel.php';

    $patientName = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    $number = $_REQUEST['number'];
    $email = $_REQUEST['email'];
    $doctorId = $_SESSION['doctorId'];
    $comment = $_REQUEST['comment'];
    
    if($patientName && $age && $gender && $number && $email) {
        addPatient($patientName, $age, $gender, $number, $email, $doctorId, $comment);
    } else {
        echo "<script>alert('Please fill in all required fields'); window.location.href='../view/addPatient.php';</script>";
        header('Location: ../view/addPatient.php');
        exit();
    }
?>