<?php
session_start();
require_once __DIR__ . '/../model/SpecializationModel.php';
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id  = intval($_POST['id']);
    $ok = SpecializationModel::update($id, $_POST['specilization'] ?? '');
    $_SESSION['msg'] = $ok ? "<div class='alert alert-success'>Specialization updated</div>"
                           : "<div class='alert alert-danger'>Update failed</div>";
    header("Location: ../view/specs/edit.php?id=".$id); exit;
}
