<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/DoctorModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$BASE = '/hm-mvc';
$doctors = DoctorModel::all();
?>
<div class="col-md-10 p-4">
  <h2>Admin | Manage Doctors</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <table class="table table-bordered">
    <thead><tr>
      <th>#</th><th>Specilization</th><th>Name</th><th>Address</th><th>Fees</th><th>Contact</th><th>Email</th><th>Action</th>
    </tr></thead>
    <tbody>
      <?php $i=1; while($d=$doctors->fetch_assoc()): ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= htmlspecialchars($d['specilization']) ?></td>
        <td><?= htmlspecialchars($d['doctorName']) ?></td>
        <td><?= htmlspecialchars($d['address']) ?></td>
        <td><?= htmlspecialchars($d['docFees']) ?></td>
        <td><?= htmlspecialchars($d['contactno']) ?></td>
        <td><?= htmlspecialchars($d['docEmail']) ?></td>
        <td>
          <a class="btn btn-sm btn-primary" href="./edit.php?id=<?= $d['id'] ?>">Edit</a>
          <a class="btn btn-sm btn-danger" href="../../controller/control_doctor_delete.php?id=<?= $d['id'] ?>"
             onclick="return confirm('Delete this doctor?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
