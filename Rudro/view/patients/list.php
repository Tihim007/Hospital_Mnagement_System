<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/PatientModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$rows = PatientModel::all();
?>
<div class="col-md-10 p-4">
  <h2>Manage Patients</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <table class="table table-bordered">
    <thead><tr>
      <th>#</th><th>Name</th><th>Contact</th><th>Email</th><th>Gender</th><th>Address</th><th>Age</th><th>Action</th>
    </tr></thead>
    <tbody>
      <?php $i=1; while($p=$rows->fetch_assoc()): ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= htmlspecialchars($p['PatientName']) ?></td>
          <td><?= htmlspecialchars($p['PatientContno']) ?></td>
          <td><?= htmlspecialchars($p['PatientEmail']) ?></td>
          <td><?= htmlspecialchars($p['PatientGender']) ?></td>
          <td><?= htmlspecialchars($p['PatientAdd']) ?></td>
          <td><?= htmlspecialchars($p['PatientAge']) ?></td>
          <td>
            <a class="btn btn-sm btn-primary" href="./edit.php?id=<?= $p['ID'] ?>">Edit</a>
            <a class="btn btn-sm btn-outline-danger" href="../../controller/control_patient_delete.php?id=<?= $p['ID'] ?>" onclick="return confirm('Delete?')">
              <i class="bi bi-trash"></i>Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
