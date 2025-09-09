<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: ../view/auth/login.php"); exit; }

require_once __DIR__ . '/../model/mydb.php';
require_once __DIR__ . '/../model/AdminModel.php';

$imageErr = "";
$msg = "";

if (isset($_POST["submit"])) {
    // basic required fields
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm  = trim($_POST['confirm']  ?? '');

    if ($username === '' || $password === '') {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Username and password are required.</div>";
        header("Location: ../view/admins/add.php"); exit;
    }
    if ($password !== $confirm) {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Password and confirm password do not match.</div>";
        header("Location: ../view/admins/add.php"); exit;
    }

    // ===== File upload (converted from your sample) =====
    $imgPath = null; // what we'll store in DB (relative path)
    $hasErr  = false;

    if (isset($_FILES["imageInput"]) && ($_FILES["imageInput"]["error"] === 0)) {

        // Allowed types/sizes (copying your style)
        // If you also want PDFs, add 'application/pdf' to this list
        $allowedType = ["image/jpeg", "image/png", "image/webp", "image/gif"];
        $maxSize     = 1 * 1024 * 1024; // 1 MB like your example

        $fileType = $_FILES["imageInput"]["type"];
        $fileSize = $_FILES["imageInput"]["size"];
        $tmpName  = $_FILES["imageInput"]["tmp_name"];

        if (!in_array($fileType, $allowedType, true)) {
            $hasErr = true;
            $imageErr = "Unsupported Type";
        } elseif ($fileSize > $maxSize) {
            $hasErr = true;
            $imageErr = "File is Too Large";
        } else {
            $uploadDirRel = "uploads/admins/";                 // relative to project root
            $uploadDirAbs = __DIR__ . '/../' . $uploadDirRel;  // absolute for move_uploaded_file

            if (!is_dir($uploadDirAbs)) {
                // create folder like your sample
                @mkdir($uploadDirAbs, 0777, true);
            }

            // unique name (safer than basename() raw)
            $ext = strtolower(pathinfo($_FILES["imageInput"]["name"], PATHINFO_EXTENSION));
            $safeName = 'admin_' . time() . '_' . bin2hex(random_bytes(3)) . '.' . $ext;

            $targetRel = $uploadDirRel . $safeName; // what we store in DB
            $targetAbs = $uploadDirAbs . $safeName; // move destination

            if (!move_uploaded_file($tmpName, $targetAbs)) {
                $hasErr = true;
                $imageErr = "Failed to move uploaded file";
            } else {
                $imgPath = $targetRel;
            }
        }
    } elseif (!empty($_FILES["imageInput"]["name"])) {
        // A file was selected but php gave an error code
        $hasErr = true;
        $imageErr = "Upload error code: " . (int)($_FILES["imageInput"]["error"]);
    }

    if ($hasErr) {
        $_SESSION['imageErr'] = $imageErr;
        // Keep other form messages too (optional)
        $_SESSION['msg'] = "<div class='alert alert-warning'>Please fix the highlighted upload issue.</div>";
        header("Location: ../view/admins/add.php");
        exit;
    }

    // ===== Save to DB (img path nullable) =====
    $ok = AdminModel::createAdmin($username, $password, $imgPath);
    $_SESSION['msg'] = $ok
        ? "<div class='alert alert-success'>Admin created successfully.</div>"
        : "<div class='alert alert-danger'>Failed to create admin (username duplicate?).</div>";

    header("Location: ../view/admins/add.php"); exit;
}

// fallback
header("Location: ../view/admins/add.php"); exit;
