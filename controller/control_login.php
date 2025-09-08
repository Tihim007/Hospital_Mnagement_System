<?php
session_start();
require_once __DIR__ . '/../model/AdminModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';
    $admin = AdminModel::checkLogin($u, $p);
    if ($admin) {
        $_SESSION['login'] = $u;
        header("Location: ../view/dashboard.php"); exit;
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Invalid credentials</div>";
        header("Location: ../view/auth/login.php"); exit;
    }
} else {
    header("Location: ../view/auth/login.php"); exit;
}
