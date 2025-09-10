<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['login'])) { header("Location: ./login.php"); exit; }

$BASE = '/hm-mvc';
$errors = $_SESSION['errors'] ?? [];
$old    = $_SESSION['old']    ?? [];
unset($_SESSION['errors'], $_SESSION['old']);

include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
?>

<div class="col-md-10 p-4">
  <h2>Change Password</h2>

  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>

  <form method="post" action="../../controller/control_change_password.php" class="col-md-6" novalidate>
    <div class="mb-3">
      <label class="form-label">Old Password</label>
      <input type="password"
             name="oldpass"
             class="form-control <?= isset($errors['oldpass']) ? 'is-invalid' : '' ?>"
             required>
      <?php if (isset($errors['oldpass'])): ?>
        <div class="invalid-feedback"><?= htmlspecialchars($errors['oldpass']) ?></div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label class="form-label">New Password</label>
      <input type="password"
             name="newpass"
             class="form-control <?= isset($errors['newpass']) ? 'is-invalid' : '' ?>"
             required>
      <?php if (isset($errors['newpass'])): ?>
        <div class="invalid-feedback"><?= htmlspecialchars($errors['newpass']) ?></div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label class="form-label">Confirm New Password</label>
      <input type="password"
             name="confirmpass"
             class="form-control <?= isset($errors['confirmpass']) ? 'is-invalid' : '' ?>"
             required>
      <?php if (isset($errors['confirmpass'])): ?>
        <div class="invalid-feedback"><?= htmlspecialchars($errors['confirmpass']) ?></div>
      <?php endif; ?>
    </div>

    <button class="btn btn-primary">Update</button>
  </form>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
