<?php
session_start();
if (isset($_SESSION['login'])) {
  header("Location: view/dashboard.php"); exit;
} else {
  header("Location: view/auth/login.php"); exit;
}
