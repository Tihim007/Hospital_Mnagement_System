<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }
require_once __DIR__ . '/../../model/UserModel.php';
include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
$rows = UserModel::all();
?>
<div class="col-md-10 p-4">
  <h2>Manage Users</h2>
  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
  <table class="table table-bordered">
    <thead><tr>
      <th>#</th><th>Name</th><th>Address</th><th>City</th><th>Gender</th><th>Email</th><th>Contact</th><th>Action</th>
    </tr></thead>
    <tbody>
      <?php $i=1; while($u=$rows->fetch_assoc()): ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= htmlspecialchars($u['fullName']) ?></td>
        <td><?= htmlspecialchars($u['address']) ?></td>
        <td><?= htmlspecialchars($u['city']) ?></td>
        <td><?= htmlspecialchars($u['gender']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><?= htmlspecialchars($u['contactno']) ?></td>
        <td>
          <a class="btn btn-sm btn-primary" href="./edit.php?id=<?= $u['id'] ?>">Edit</a>
          <a class="btn btn-sm btn-outline-danger" href="../../controller/control_user_delete.php?id=<?= $u['id'] ?>" onclick="return confirm('Delete?')">
            <i class="bi bi-trash"></i>Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include __DIR__ . '/../partials/footer.php'; ?>
