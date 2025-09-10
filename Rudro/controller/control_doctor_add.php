<?php
session_start();
require_once __DIR__ . '/../model/DoctorModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ok = DoctorModel::create([
        'specilization' => $_POST['specilization'] ?? '',
        'doctorName'    => $_POST['doctorName'] ?? '',
        'address'       => $_POST['address'] ?? '',
        'docFees'       => $_POST['docFees'] ?? '',
        'contactno'     => $_POST['contactno'] ?? '',
        'docEmail'      => $_POST['docEmail'] ?? '',
        'password'      => $_POST['password'] ?? '',
    ]);
    $_SESSION['msg'] = $ok ? "<div class='alert alert-success'>Doctor added</div>"
                           : "<div class='alert alert-danger'>Failed</div>";
    header("Location: ../view/doctors/add.php"); exit;
}
