<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/SpecializationModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$specs = SpecializationModel::all();
?>
<div class="col-md-10 p-4">
  <h2>Add Doctor</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>

  <form method="post" action="../../controller/control_doctor_add.php" class="col-md-8">
    <div class="mb-3">
      <label class="form-label">Specialization</label>
      <select name="specilization" class="form-select" required>
        <?php while($s = $specs->fetch_assoc()): ?>
          <option value="<?= htmlspecialchars($s['specilization']) ?>"><?= htmlspecialchars($s['specilization']) ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3"><label class="form-label">Doctor Name</label><input name="doctorName" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Address</label><textarea name="address" class="form-control" required></textarea></div>
    <div class="mb-3"><label class="form-label">Fees</label><input name="docFees" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Contact No</label><input name="contactno" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input name="docEmail" type="email" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Password</label><input name="password" type="text" class="form-control" required></div>
    <button class="btn btn-success">Submit</button>
  </form>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
