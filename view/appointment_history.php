<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ./auth/login.php"); exit; }
require_once __DIR__ . '/../model/AppointmentModel.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/sidebar.php';
$rows = AppointmentModel::historyAll();
?>

<div class="col-md-10 p-4">
  <h2>Appointment History</h2>

  <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>

  <table class="table table-bordered align-middle">
    <thead>
      <tr>
        <th>#</th>
        <th>Specialization</th>
        <th>Doctor ID</th>
        <th>User ID</th>
        <th>Fees</th>
        <th>Date</th>
        <th>Time</th>
        <th style="width:120px;">Action</th> <!-- NEW -->
      </tr>
    </thead>
    <tbody>
      <?php $i=1; while($a = $rows->fetch_assoc()): ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= htmlspecialchars($a['doctorSpecilization']) ?></td>
        <td><?= htmlspecialchars($a['doctorId']) ?></td>
        <td><?= htmlspecialchars($a['userId']) ?></td>
        <td><?= htmlspecialchars($a['consultancyFees']) ?></td>
        <td><?= htmlspecialchars($a['appointmentDate']) ?></td>
        <td><?= htmlspecialchars($a['appointmentTime']) ?></td>
        <td>
          <a class="btn btn-sm btn-danger"
             href="../controller/control_appointment_delete.php?id=<?= (int)$a['id'] ?>"
             onclick="return confirm('Delete this appointment?');">
            Delete
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
