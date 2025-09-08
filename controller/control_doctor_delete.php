<?php
session_start();
require_once __DIR__ . '/../model/DoctorModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id) DoctorModel::delete($id);
$_SESSION['msg'] = "<div class='alert alert-success'>Doctor deleted successfully!</div>";
header("Location: ../view/doctors/list.php"); exit;
