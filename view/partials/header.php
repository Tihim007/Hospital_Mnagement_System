<?php
// base + session
if (!isset($BASE)) { $BASE = '/hm-mvc'; }
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Defaults
$adminName = 'Admin';
$avatarRel = 'view/assets/images.jpg'; // fallback image path (keep a default avatar here)

// If logged in, try session values first
if (!empty($_SESSION['login'])) {
  if (!empty($_SESSION['admin_name'])) { $adminName = $_SESSION['admin_name']; }
  if (!empty($_SESSION['admin_img']))  { $avatarRel = $_SESSION['admin_img']; }

  // Optional: if image not in session yet, fetch once from DB and cache it
  if (empty($_SESSION['admin_img']) && !empty($_SESSION['admin_id'])) {
    require_once __DIR__ . '/../../model/AdminModel.php';
    $me = AdminModel::find((int)$_SESSION['admin_id']);
    if ($me) {
      $adminName = $me['a_username'] ?? $adminName;
      if (!empty($me['admin_img'])) {
        $avatarRel = $me['admin_img'];
        $_SESSION['admin_img'] = $me['admin_img']; // cache for next requests
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= $BASE ?>/view/assets/style.css" rel="stylesheet">
</head>
<body class="bg-light">

<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-dark" href="<?= $BASE ?>/view/dashboard.php">
      <i class="bi bi-hospital me-2 text-primary"></i>
      <span style="font-size:22px;">HMS</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="topNavbar">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3">
          <h6 class="m-0 fw-semibold">HDIMS</h6>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Use session/DB-driven avatar + name -->
            <img src="<?= $BASE ?>/<?= htmlspecialchars($avatarRel) ?>"
                 class="rounded-circle me-2" width="35" height="35" style="object-fit:cover" alt="Admin">
            <span><?= htmlspecialchars($adminName) ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
              <a class="dropdown-item" href="<?= $BASE ?>/view/auth/change-password.php">
                <i class="bi bi-key me-2"></i> Change Password
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= $BASE ?>/controller/control_logout.php">
                <i class="bi bi-box-arrow-right me-2"></i> Log Out
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
