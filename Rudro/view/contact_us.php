<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['login'])) { header("Location: ./auth/login.php"); exit; }

$BASE = '/hm-mvc';      // change if your folder name is different
$ACTIVE = 'contact';    // optional: highlight menu

require_once __DIR__ . '/../model/ContactModel.php';

// -------- Handle status update (same behavior as old file) --------
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = (int)$_GET['id'];
    $status = ($_GET['status'] === 'done') ? 'done' : 'notdone';

    if ($id > 0) {
        ContactModel::updateStatus($id, $status);
        $_SESSION['msg'] = "<div class='alert alert-success'>Query status updated successfully!</div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Invalid ID.</div>";
    }
    header("Location: ./contact_us.php");
    exit;
}

// -------- Filtering (same logic) --------
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
$queries = ContactModel::listFiltered($filter);

// layout
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/sidebar.php';
?>

<div class="col-md-10 p-4">
  <h2>Admin | Contact Queries</h2>

  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>

  <!-- Filters -->
  <div class="mb-3 d-flex gap-2">
    <form method="get" action="./contact_us.php">
      <input type="hidden" name="filter" value="all">
      <button type="submit" class="btn btn-secondary">Show All</button>
    </form>
    <form method="get" action="./contact_us.php">
      <input type="hidden" name="filter" value="notdone">
      <button type="submit" class="btn btn-warning">Show Pending Queries</button>
    </form>
    <form method="get" action="./contact_us.php">
      <input type="hidden" name="filter" value="done">
      <button type="submit" class="btn btn-success">Show Completed Queries</button>
    </form>
  </div>

  <table class="table table-hover table-bordered align-middle">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Message</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $queries->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['fullname']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['contactno']) ?></td>
          <td><?= htmlspecialchars($row['message']) ?></td>
          <td><?= htmlspecialchars($row['date']) ?></td>
          <td>
            <?php if ($row['status'] === 'done'): ?>
              <span class="badge bg-success">Done</span>
            <?php else: ?>
              <span class="badge bg-warning text-dark">Pending</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="../controller/control_contact_status.php?id=<?= (int)$row['id'] ?>&status=done"
              class="btn btn-sm <?= ($row['status'] === 'done') ? 'btn-success' : 'btn-outline-success' ?>">
              <i class="bi bi-check-lg"></i>
            </a>

            <a href="../controller/control_contact_status.php?id=<?= (int)$row['id'] ?>&status=notdone"
              class="btn btn-sm <?= ($row['status'] === 'notdone') ? 'btn-danger' : 'btn-outline-danger' ?>">
              <i class="bi bi-x-lg"></i>
            </a>

          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
