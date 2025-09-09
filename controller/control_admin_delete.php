<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

require_once __DIR__ . '/../model/AdminModel.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Invalid admin id.</div>";
    header("Location: ../view/admins/list.php"); exit;
}

// Optional: fetch to remove the image file too
$admin = AdminModel::find($id);
$ok = AdminModel::deleteById($id);

if ($ok) {
    // try to remove the image file if it exists
    if ($admin && !empty($admin['admin_img'])) {
        $abs = __DIR__ . '/../' . $admin['admin_img'];
        if (is_file($abs)) { @unlink($abs); }
    }
    $_SESSION['msg'] = "<div class='alert alert-success'>Admin deleted.</div>";
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Failed to delete admin.</div>";
}

header("Location: ../view/admins/list.php");
exit;
