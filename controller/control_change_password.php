<?php
session_start();
require_once __DIR__ . '/../model/AdminModel.php';
require_once __DIR__ . '/../model/AdminPassword_Validation.php';

if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old     = $_POST['oldpass']      ?? '';
    $new     = $_POST['newpass']      ?? '';
    $confirm = $_POST['confirmpass']  ?? '';

    // MVC: delegate to validator
    [$ok, $errors] = Validation::validateChangePassword($old, $new, $confirm);

    if (!$ok) {
        // flash errors + old input to session, then redirect back to the view
        $_SESSION['errors'] = $errors;
        // never store the old password field values; only flag which inputs were attempted
        $_SESSION['old'] = ['oldpass' => '', 'newpass' => '', 'confirmpass' => ''];
        header("Location: ../view/auth/change-password.php");
        exit;
    }

    // business action
    $changed = AdminModel::changePassword($old, $new);

    $_SESSION['msg'] = $changed
        ? "<div class='alert alert-success'>Password changed.</div>"
        : "<div class='alert alert-danger'>Old password incorrect.</div>";

    header("Location: ../view/auth/change-password.php"); exit;
}

header("Location: ../view/auth/change-password.php"); exit;
