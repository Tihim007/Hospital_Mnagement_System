<?php
session_start();
require_once __DIR__ . '/../model/AdminModel.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$row = AdminModel::checkLogin($username, $password); // make it return id, a_username, admin_img
if ($row) {
    $_SESSION['login']      = true;
    $_SESSION['admin_id']   = (int)$row['id'];
    $_SESSION['admin_name'] = $row['a_username'] ?? 'Admin';
    $_SESSION['admin_img']  = $row['admin_img'] ?? null;   // e.g. "uploads/admins/abc.png"
    header('Location: ../view/dashboard.php'); exit;
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Invalid credentials.</div>";
    header('Location: ../view/auth/login.php'); exit;
}
