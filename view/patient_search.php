<?php
// ---------- auth + setup ----------
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['login'])) { header("Location: ./auth/login.php"); exit; }

// set base path for links/assets if you use it in header/sidebar
$BASE = '/hm-mvc';

// DB
require_once __DIR__ . '/../model/mydb.php';
$db = getDBConnection();

// layout
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/sidebar.php';

// inputs
$patient_id = isset($_GET['patient_id']) && $_GET['patient_id'] !== '' ? (int)$_GET['patient_id'] : null;

$patient = null;
$appt_res = null;

if ($patient_id !== null) {
    // ---- Patient fetch (same as your original, but safely prepared) ----
    $stmt = $db->prepare("SELECT * FROM tblpatient WHERE ID = ?");
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $patient_res = $stmt->get_result();
    if ($patient_res && $patient_res->num_rows > 0) {
        $patient = $patient_res->fetch_assoc();

        // ---- Appointment history for this patient (same logic as yours) ----
        // NOTE: your original maps tblpatient.ID -> appointment.userId (kept exactly the same)
        $stmt2 = $db->prepare("SELECT * FROM appointment WHERE userId = ? ORDER BY appointmentDate DESC");
        $stmt2->bind_param("i", $patient['ID']);
        $stmt2->execute();
        $appt_res = $stmt2->get_result();
    }
}
?>

<div class="col-md-10 p-4">
  <h2>Admin | Patient Search</h2>

  <!-- Search Form -->
  <form method="GET" action="./patient_search.php" class="row g-3 mb-4">
    <div class="col-auto">
      <input
        type="number"
        name="patient_id"
        class="form-control"
        placeholder="Enter Patient ID"
        value="<?= $patient_id !== null ? htmlspecialchars((string)$patient_id) : '' ?>">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </form>

  <?php if ($patient_id !== null): ?>
    <?php if ($patient): ?>

      <!-- ================= Patient Info Card ================= -->
      <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
          <h5 class="m-0">Patient Information</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tbody>
              <tr><th>ID</th><td><?= htmlspecialchars($patient['ID']) ?></td></tr>
              <tr><th>Doctor ID</th><td><?= htmlspecialchars($patient['Docid']) ?></td></tr>
              <tr><th>Name</th><td><?= htmlspecialchars($patient['PatientName']) ?></td></tr>
              <tr><th>Contact No</th><td><?= htmlspecialchars($patient['PatientContno']) ?></td></tr>
              <tr><th>Email</th><td><?= htmlspecialchars($patient['PatientEmail']) ?></td></tr>
              <tr><th>Gender</th><td><?= htmlspecialchars($patient['PatientGender']) ?></td></tr>
              <tr><th>Address</th><td><?= htmlspecialchars($patient['PatientAdd']) ?></td></tr>
              <tr><th>Age</th><td><?= htmlspecialchars($patient['PatientAge']) ?></td></tr>
              <tr><th>Medical History</th><td><?= htmlspecialchars($patient['PatientMedhis']) ?></td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- ================= Appointment History Card ================= -->
      <div class="card shadow">
        <div class="card-header bg-success text-white">
          <h5 class="m-0">Appointment History</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Appointment ID</th>
                <th>Doctor Specialization</th>
                <th>Doctor ID</th>
                <th>User ID</th>
                <th>Consultancy Fees</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($appt_res && $appt_res->num_rows > 0): ?>
                <?php while ($appt = $appt_res->fetch_assoc()): ?>
                  <tr>
                    <td><?= htmlspecialchars($appt['id']) ?></td>
                    <td><?= htmlspecialchars($appt['doctorSpecilization']) ?></td>
                    <td><?= htmlspecialchars($appt['doctorId']) ?></td>
                    <td><?= htmlspecialchars($appt['userId']) ?></td>
                    <td><?= htmlspecialchars($appt['consultancyFees']) ?></td>
                    <td><?= htmlspecialchars($appt['appointmentDate']) ?></td>
                    <td><?= htmlspecialchars($appt['appointmentTime']) ?></td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr><td colspan="7" class="text-center text-muted">No appointments found</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    <?php else: ?>
      <div class="alert alert-danger mt-3">❌ No patient found with the given ID.</div>
    <?php endif; ?>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
