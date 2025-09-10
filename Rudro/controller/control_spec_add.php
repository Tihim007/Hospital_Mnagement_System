<?php
session_start();
require_once __DIR__ . '/../model/SpecializationModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ok = SpecializationModel::create($_POST['specilization'] ?? '');
    $_SESSION['msg'] = $ok ? "<div class='alert alert-success'>Specialization added</div>"
                           : "<div class='alert alert-danger'>Failed</div>";
    header("Location: ../view/specs/list.php"); exit;
}
