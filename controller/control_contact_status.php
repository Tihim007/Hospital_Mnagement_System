<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }
require_once __DIR__ . '/../model/ContactModel.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$status = (isset($_GET['status']) && $_GET['status'] === 'done') ? 'done' : 'notdone';

if ($id > 0) {
    ContactModel::updateStatus($id, $status);
    $_SESSION['msg'] = "<div class='alert alert-success'>Query status updated successfully!</div>";
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Invalid ID.</div>";
}

header("Location: ../view/contact_us.php");
exit;
