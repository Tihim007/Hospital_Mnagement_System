<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/SpecializationModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$specs = SpecializationModel::all();
?>
<div class="col-md-10 p-4">
  <h2>Doctor Specialization</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>

  <form class="row g-2 mb-4" method="post" action="../../controller/control_spec_add.php">
    <div class="col-auto"><input class="form-control" name="specilization" placeholder="New Specialization" required></div>
    <div class="col-auto"><button class="btn btn-success">Add</button></div>
  </form>

  <table class="table table-bordered">
    <thead><tr><th>#</th><th>Specialization</th><th>Action</th></tr></thead>
    <tbody>
      <?php $i=1; while($s=$specs->fetch_assoc()): ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= htmlspecialchars($s['specilization']) ?></td>
        <td>
          <a class="btn btn-sm btn-primary" href="./edit.php?id=<?= $s['id'] ?>">Edit</a>
          <a class="btn btn-sm btn-danger" href="../../controller/control_spec_delete.php?id=<?= $s['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
