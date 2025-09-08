<?php
session_start();
require_once __DIR__ . '/../model/UserModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id) UserModel::delete($id);
$_SESSION['msg'] = "<div class='alert alert-success'>User deleted</div>";
header("Location: ../view/users/list.php"); exit;
