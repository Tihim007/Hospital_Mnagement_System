<?php
    session_start();
    include_once '../model/doctorModel.php';

    
    $_SESSION['apHistory'] = getAppointmentHistory($_SESSION['doctorId']);
    header('Location: ../view/appointmentHistory.php');
    exit();
?>