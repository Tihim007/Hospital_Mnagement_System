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
        updatePatient($_POST['id'], $patientName, $age, $gender, $number, $email, $comment);
    } else {
        header('Location: allPatientController.php');
        exit();
    }
?>