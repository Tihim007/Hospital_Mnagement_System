
<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

require_once __DIR__ . '/../model/AppointmentModel.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    AppointmentModel::delete($id);
    $_SESSION['msg'] = "<div class='alert alert-success'>Appointment deleted.</div>";
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Invalid appointment id.</div>";
}

header("Location: ../view/appointment_history.php");
exit;
