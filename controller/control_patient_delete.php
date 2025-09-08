<?php
session_start();
require_once __DIR__ . '/../model/PatientModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id) PatientModel::delete($id);
$_SESSION['msg'] = "<div class='alert alert-success'>Patient deleted</div>";
header("Location: ../view/patients/list.php"); exit;
