<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }

$BASE = '/hm-mvc';
$ACTIVE = 'admins';

require_once __DIR__ . '/../../model/AdminModel.php';

$rows = AdminModel::all();

include __DIR__ . '/../partials/header.php';
include __DIR__ . '/../partials/sidebar.php';
?>

<div class="col-md-10 p-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="m-0">Admins</h2>
    <a class="btn btn-primary" href="<?= $BASE ?>/view/admins/add.php">
      <i class="bi bi-person-plus me-1"></i> Add Admin
    </a>
  </div>

  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th style="width:80px;">Photo</th>
          <th>Username</th>
          <th style="width:140px;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($a = $rows->fetch_assoc()): ?>
          <tr>
            <td>
              <?php
                $img = !empty($a['admin_img']) ? $a['admin_img'] : 'view/assets/default-avatar.png';
              ?>
              <img src="<?= $BASE ?>/<?= htmlspecialchars($img) ?>" alt="Admin"
                   class="rounded" width="48" height="48"
                   style="object-fit:cover;">
            </td>
            <td class="fw-semibold"><?= htmlspecialchars($a['a_username']) ?></td>
            <td>
              <a class="btn btn-sm btn-outline-danger"
                 href="<?= $BASE ?>/controller/control_admin_delete.php?id=<?= (int)$a['id'] ?>"
                 onclick="return confirm('Delete this admin?');">
                <i class="bi bi-trash"></i> Delete
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
