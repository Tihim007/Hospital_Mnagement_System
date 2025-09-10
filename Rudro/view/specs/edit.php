<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/SpecializationModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$id = intval($_GET['id'] ?? 0); $spec = SpecializationModel::find($id);
?>
<div class="col-md-10 p-4">
  <h2>Update Specialization</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <?php if ($spec): ?>
  <form method="post" action="../../controller/control_spec_update.php" class="col-md-6">
    <input type="hidden" name="id" value="<?= $spec['id'] ?>">
    <div class="mb-3">
      <label class="form-label">Specialization</label>
      <input name="specilization" class="form-control" value="<?= htmlspecialchars($spec['specilization']) ?>" required>
    </div>
    <button class="btn btn-primary">Update</button>
  </form>
  <?php else: ?>
    <div class="alert alert-danger">Not found.</div>
  <?php endif; ?>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
