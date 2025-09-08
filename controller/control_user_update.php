<?php
session_start();
require_once __DIR__ . '/../model/UserModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $ok = UserModel::update($id, [
        'fullName' => $_POST['fullName'] ?? '',
        'address'  => $_POST['address'] ?? '',
        'city'     => $_POST['city'] ?? '',
        'gender'   => $_POST['gender'] ?? '',
        'email'    => $_POST['email'] ?? '',
        'password' => $_POST['password'] ?? '',
        'contactno'=> $_POST['contactno'] ?? '',
    ]);
    $_SESSION['msg'] = $ok ? "<div class='alert alert-success'>User updated</div>"
                           : "<div class='alert alert-danger'>Update failed</div>";
    header("Location: ../view/users/edit.php?id=".$id); exit;
}
