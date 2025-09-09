<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
$BASE = '/hm-mvc';

$imageErr = $_SESSION['imageErr'] ?? '';
$msg      = $_SESSION['msg']      ?? '';
unset($_SESSION['imageErr'], $_SESSION['msg']);

include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
?>
<div class="col-md-10 p-4">
  <h2 class="mb-3">Add Admin</h2>

  <?php if ($msg) echo $msg; ?>

  <form action="<?= $BASE ?>/controller/control_admin_add.php" method="POST" enctype="multipart/form-data" class="col-md-6">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="confirm" class="form-control" required>
    </div>

    <!-- ⬇️ Your sample-style upload -->
    <div class="mb-3">
      <label for="imageInput" class="form-label">Admin Image (optional)</label>
      <input type="file" name="imageInput" id="imageInput" class="form-control" accept="image/*">
      <span style="color:red;"><?= htmlspecialchars($imageErr) ?></span>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Create Admin</button>
  </form>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
