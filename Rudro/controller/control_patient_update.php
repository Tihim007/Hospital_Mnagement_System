<?php
session_start();
require_once __DIR__ . '/../model/PatientModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['ID']);
    $ok = PatientModel::update($id, [
        'Docid'         => $_POST['Docid'] ?? '',
        'PatientName'   => $_POST['PatientName'] ?? '',
        'PatientContno' => $_POST['PatientContno'] ?? '',
        'PatientEmail'  => $_POST['PatientEmail'] ?? '',
        'PatientGender' => $_POST['PatientGender'] ?? '',
        'PatientAdd'    => $_POST['PatientAdd'] ?? '',
        'PatientAge'    => $_POST['PatientAge'] ?? '',
        'PatientMedhis' => $_POST['PatientMedhis'] ?? '',
    ]);
    $_SESSION['msg'] = $ok ? "<div class='alert alert-success'>Patient updated</div>"
                           : "<div class='alert alert-danger'>Update failed</div>";
    header("Location: ../view/patients/edit.php?id=".$id); exit;
}
