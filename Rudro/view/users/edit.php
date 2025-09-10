<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/UserModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$id = intval($_GET['id'] ?? 0);
$u  = UserModel::find($id);
?>
<div class="col-md-10 p-4">
  <h2>Update User</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <?php if ($u): ?>
  <form method="post" action="../../controller/control_user_update.php" class="col-md-8">
    <input type="hidden" name="id" value="<?= $u['id'] ?>">
    <div class="mb-3"><label class="form-label">Full Name</label><input name="fullName" class="form-control" value="<?= htmlspecialchars($u['fullName']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Address</label><input name="address" class="form-control" value="<?= htmlspecialchars($u['address']) ?>" required></div>
    <div class="mb-3"><label class="form-label">City</label><input name="city" class="form-control" value="<?= htmlspecialchars($u['city']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Gender</label><input name="gender" class="form-control" value="<?= htmlspecialchars($u['gender']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input name="email" type="email" class="form-control" value="<?= htmlspecialchars($u['email']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Password</label><input name="password" class="form-control" value="<?= htmlspecialchars($u['password']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Contact No</label><input name="contactno" class="form-control" value="<?= htmlspecialchars($u['contactno']) ?>" required></div>
    <button class="btn btn-primary">Update</button>
  </form>
  <?php else: ?>
    <div class="alert alert-danger">User not found.</div>
  <?php endif; ?>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
