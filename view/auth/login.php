<?php
// Compact stand-alone login (no header/footer includes)
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (isset($_SESSION['login'])) { header("Location: ../dashboard.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --card-w: 520px;   /* narrower card */
      --pad: 1rem;       /* tighter padding */
      --gap: .75rem;     /* tighter gaps */
      --muted: #6c757d;
      --bg: #f6f7f9;
    }
    body { background: var(--bg); }
    .wrap { min-height: 100vh; display:flex; align-items:center; justify-content:center; padding: 2rem 1rem; }
    .title { letter-spacing:.4px; color:#5c636a; margin-bottom: .75rem; }
    .card-login { width: 100%; max-width: var(--card-w); border:0; border-radius:.6rem; box-shadow: 0 8px 24px rgba(0,0,0,.06); }
    .card-login .card-body { padding: calc(var(--pad) * 1.5); }
    .section { display:flex; align-items:center; margin-bottom: .5rem; }
    .section h6 { color:#0d6efd; margin:0; font-weight:600; }
    .section .line { flex:1; height:1px; background: rgba(0,0,0,.1); margin-left:.5rem; }
    .hint { color: var(--muted); margin-bottom: var(--gap); font-size: .95rem; }

    .input-group-text { background:#fff; border-right:0; }
    .form-control { border-left:0; height: 42px; } /* consistent input height */
    .btn-login { height: 42px; padding: 0 1rem; }

    .foot-mini { margin-top:.75rem; color:#6b7280; letter-spacing:.08em; font-weight:600; font-size:.9rem; text-align:center; }
    /* small screens tweaks */
    @media (max-width: 420px){
      :root{ --card-w: 100%; }
      .card-login .card-body{ padding: var(--pad); }
    }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="w-100" style="max-width: var(--card-w);">
      <!-- Title -->
      <h1 class="h2 fw-light text-center title">Admin Login</h1>

      <!-- Card -->
      <div class="card card-login">
        <div class="card-body">
          <div class="section">
            <h6>Sign in to your account</h6>
            <div class="line"></div>
          </div>
          <p class="hint">Please enter your name and password to log in.</p>

          <?php if (!empty($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>

          <form method="post" action="../../controller/control_login.php" novalidate>
            <div class="input-group mb-2">
              <span class="input-group-text"><i class="bi bi-person-fill text-primary"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text"><i class="bi bi-lock-fill text-primary"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <a class="link-primary" href="/hm-mvc/index.php">Bacto Home Page</a>
              <button class="btn btn-primary btn-login">
                Login <i class="bi bi-arrow-right-circle ms-1"></i>
              </button>
            </div>
          </form>
        </div>
      </div>

      <div class="foot-mini">HOSPITAL MANAGEMENT SYSTEM</div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
