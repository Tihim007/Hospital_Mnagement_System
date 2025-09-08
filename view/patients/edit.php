<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/PatientModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$id = intval($_GET['id'] ?? 0);
$p  = PatientModel::find($id);
?>
<div class="col-md-10 p-4">
  <h2>Update Patient</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <?php if ($p): ?>
  <form method="post" action="../../controller/control_patient_update.php" class="col-md-8">
    <input type="hidden" name="ID" value="<?= $p['ID'] ?>">
    <div class="mb-3"><label class="form-label">Doctor ID</label><input name="Docid" class="form-control" value="<?= htmlspecialchars($p['Docid']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Name</label><input name="PatientName" class="form-control" value="<?= htmlspecialchars($p['PatientName']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Contact</label><input name="PatientContno" class="form-control" value="<?= htmlspecialchars($p['PatientContno']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input name="PatientEmail" type="email" class="form-control" value="<?= htmlspecialchars($p['PatientEmail']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Gender</label><input name="PatientGender" class="form-control" value="<?= htmlspecialchars($p['PatientGender']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Address</label><textarea name="PatientAdd" class="form-control" required><?= htmlspecialchars($p['PatientAdd']) ?></textarea></div>
    <div class="mb-3"><label class="form-label">Age</label><input name="PatientAge" class="form-control" value="<?= htmlspecialchars($p['PatientAge']) ?>" required></div>
    <div class="mb-3"><label class="form-label">Medical History</label><textarea name="PatientMedhis" class="form-control"><?= htmlspecialchars($p['PatientMedhis']) ?></textarea></div>
    <button class="btn btn-primary">Update</button>
  </form>
  <?php else: ?>
    <div class="alert alert-danger">Patient not found.</div>
  <?php endif; ?>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
