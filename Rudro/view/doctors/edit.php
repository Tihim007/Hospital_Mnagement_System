<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/DoctorModel.php';
require_once __DIR__ . '/../../model/SpecializationModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';

$id  = intval($_GET['id'] ?? 0);
$doc = DoctorModel::find($id);
$specs = SpecializationModel::all();
?>
<div class="col-md-10 p-4">
  <h2>Update Doctor</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <?php if ($doc): ?>
  <form method="post" action="../../controller/control_doctor_update.php" class="col-md-8">
    <input type="hidden" name="id" value="<?= $doc['id'] ?>">
    <div class="mb-3">
      <label class="form-label">Specialization</label>
      <select name="specilization" class="form-select" required>
        <?php while($s = $specs->fetch_assoc()): ?>
          <option value="<?= htmlspecialchars($s['specilization']) ?>" <?= $doc['specilization']==$s['specilization']?'selected':'' ?>>
            <?= htmlspecialchars($s['specilization']) ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="mb-3"><label class="form-label">Doctor Name</label><input name="doctorName" class="form-control" value="<?= htmlspecialchars($doc['doctorName']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Address</label><textarea name="address" class="form-control" required><?= htmlspecialchars($doc['address']) ?></textarea></div>
    <div class="mb-3"><label class="form-label">Fees</label><input name="docFees" class="form-control" value="<?= htmlspecialchars($doc['docFees']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Contact No</label><input name="contactno" class="form-control" value="<?= htmlspecialchars($doc['contactno']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input name="docEmail" type="email" class="form-control" value="<?= htmlspecialchars($doc['docEmail']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Password</label><input name="password" type="text" class="form-control" value="<?= htmlspecialchars($doc['password']) ?>" required></div>
    <button class="btn btn-primary">Update</button>
  </form>
  <?php else: ?>
    <div class="alert alert-danger">Doctor not found.</div>
  <?php endif; ?>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
