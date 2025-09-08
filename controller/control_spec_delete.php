<?php
session_start();
require_once __DIR__ . '/../model/SpecializationModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id) SpecializationModel::delete($id);
$_SESSION['msg'] = "<div class='alert alert-success'>Specialization deleted</div>";
header("Location: ../view/specs/list.php"); exit;
