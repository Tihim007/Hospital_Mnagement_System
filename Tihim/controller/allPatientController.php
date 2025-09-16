<?php
    session_start();
    include_once '../model/PatientModel.php';
    $patients = [];

    $patients = getPatientsByDoctor($_SESSION['doctorId']);
    $_SESSION['patients'] = $patients;
    header('Location: ../view/viewPatient.php');

?>