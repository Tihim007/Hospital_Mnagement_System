<?php session_start(); if (isset($_SESSION['login'])) { header("Location: ../dashboard.php"); exit; } ?>
<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="col-md-4 offset-md-4 p-5">
  <h3 class="mb-3 text-center">Admin Login</h3>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <form method="post" action="../../controller/control_login.php">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="d-grid">
      <button class="btn btn-primary">Login</button>
    </div>
  </form>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
