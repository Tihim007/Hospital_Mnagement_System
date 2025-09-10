<?php
// Safe session + auth
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['login'])) { header("Location: ./auth/login.php"); exit; }

// Base path for links and assets (change if your folder is different)
$BASE = '/hm-mvc';
$ACTIVE = 'dashboard';

// Models for counts
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/DoctorModel.php';
require_once __DIR__ . '/../model/AppointmentModel.php';
require_once __DIR__ . '/../model/ContactModel.php';

// Fetch counts (same queries as your admin_dashboard.php, but via models)
$totalUsers        = UserModel::count();
$totalDoctors      = DoctorModel::count();
$totalAppointments = AppointmentModel::countAll();
$totalPatients     = AppointmentModel::countDistinctPatients();
$totalQueries      = ContactModel::countAll();

// Layout
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/sidebar.php';
?>

<!-- ================= MAIN CONTENT ================= -->
<div class="col-md-10 p-4">
  <h3 class="mb-4 fw-bold">ADMIN | DASHBOARD</h3>

  <div class="row g-4">
    <!-- Manage Users -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center p-3">
        <div class="card-body">
          <i class="bi bi-people fs-1 text-primary"></i>
          <h5 class="mt-3">Manage Users</h5>
          <p class="text-muted mb-2">Total Users: <span class="fw-bold"><?= $totalUsers ?></span></p>
          <a href="<?= $BASE ?>/view/users/list.php" class="btn btn-outline-primary btn-sm">View</a>
        </div>
      </div>
    </div>

    <!-- Manage Doctors -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center p-3">
        <div class="card-body">
          <i class="bi bi-person-badge fs-1 text-success"></i>
          <h5 class="mt-3">Manage Doctors</h5>
          <p class="text-muted mb-2">Total Doctors: <span class="fw-bold"><?= $totalDoctors ?></span></p>
          <a href="<?= $BASE ?>/view/doctors/list.php" class="btn btn-outline-success btn-sm">View</a>
        </div>
      </div>
    </div>

    <!-- Appointments -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center p-3">
        <div class="card-body">
          <i class="bi bi-calendar-check fs-1 text-info"></i>
          <h5 class="mt-3">Appointments</h5>
          <p class="text-muted mb-2">Total Appointments: <span class="fw-bold"><?= $totalAppointments ?></span></p>
          <a href="<?= $BASE ?>/view/appointment_history.php" class="btn btn-outline-info btn-sm">View</a>
        </div>
      </div>
    </div>

    <!-- Manage Patients -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center p-3">
        <div class="card-body">
          <i class="bi bi-hospital fs-1 text-danger"></i>
          <h5 class="mt-3">Manage Patients</h5>
          <p class="text-muted mb-2">Total Patients: <span class="fw-bold"><?= $totalPatients ?></span></p>
          <a href="<?= $BASE ?>/view/patients/list.php" class="btn btn-outline-danger btn-sm">View</a>
        </div>
      </div>
    </div>

    <!-- New Queries -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center p-3">
        <div class="card-body">
          <i class="bi bi-envelope fs-1 text-warning"></i>
          <h5 class="mt-3">New Queries</h5>
          <p class="text-muted mb-2">Total New Queries: <span class="fw-bold"><?= $totalQueries ?></span></p>
          <a href="<?= $BASE ?>/view/contact_us.php" class="btn btn-outline-warning btn-sm">View</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
