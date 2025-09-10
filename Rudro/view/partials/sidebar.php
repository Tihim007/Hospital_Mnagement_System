<?php /* No session_start() here */ ?>
<?php if (!isset($BASE)) { $BASE = '/hm-mvc'; } ?>

<div class="col-md-2 bg-light p-0 min-vh-100 border-end">
  <!-- Brand / header strip for the sidebar -->
  <div class="p-3 border-bottom d-flex align-items-center gap-2">
    <i class="bi bi-hospital fs-4 text-primary"></i>
    <strong>Hospital Admin</strong>
  </div>

  <ul class="nav flex-column p-2">
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/dashboard.php">
        <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Doctors</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/doctors/list.php">
        <i class="bi bi-person-badge"></i> <span>Manage Doctors</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/doctors/add.php">
        <i class="bi bi-person-plus"></i> <span>Add Doctor</span>
      </a>
    </li>

    <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Specialization</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/specs/list.php">
        <i class="bi bi-list-ul"></i> <span>Doctor Specialization</span>
      </a>
    </li>

    <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Patients</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/patients/list.php">
        <i class="bi bi-people"></i> <span>Manage Patients</span>
      </a>
    </li>

    <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Users</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/users/list.php">
        <i class="bi bi-person-lines-fill"></i> <span>Manage Users</span>
      </a>
    </li>

    <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Appointments</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/appointment_history.php">
        <i class="bi bi-clock-history"></i> <span>Appointment History</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/patient_search.php">
        <i class="bi bi-search"></i> <span>Patient Search</span>
      </a>
    </li>

    <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Contact</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2" href="<?= $BASE ?>/view/contact_us.php">
        <i class="bi bi-envelope"></i> <span>Contact Us</span>
      </a>
    </li>
    <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Admins</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2 <?= (isset($ACTIVE)&&$ACTIVE==='admins')?'active fw-semibold':'' ?>"
        href="<?= $BASE ?>/view/admins/list.php">
        <i class="bi bi-people"></i> <span>Admin List</span>
      </a>
    </li>
     <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2 <?= (isset($ACTIVE) && $ACTIVE==='admins_add') ? 'active fw-semibold' : '' ?>"
         href="<?= $BASE ?>/view/admins/add.php">
        <i class="bi bi-person-plus"></i> <span>Add Admin</span>
      </a>
    </li>

   <li class="nav-item mt-2 ps-2 text-uppercase small text-muted">Account</li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2 text-danger" href="<?= $BASE ?>/controller/control_logout.php">
        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
      </a>
    </li>
    </li>
  </ul>
</div>
