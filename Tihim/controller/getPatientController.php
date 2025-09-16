<?php
    session_start();
    include_once '../model/PatientModel.php';
    $patientData = [];
    $patientData = getPatientById($_GET['id']);
    $_SESSION['patientData'] = $patientData;
    header('Location: ../view/patientDetails.php');

?>