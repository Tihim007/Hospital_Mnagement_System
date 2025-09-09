<?php
// hm-mvc/model/AdminModel.php
require_once __DIR__ . '/mydb.php';

class AdminModel
{

    public static function changePassword(string $old, string $new): bool
    {
        $db = getDBConnection();

        // verify old password exists
        $stmt = $db->prepare("SELECT id FROM admin WHERE a_password=? LIMIT 1");
        $stmt->bind_param("s", $old);
        $stmt->execute();
        $res = $stmt->get_result();
        if (!$res || !$res->num_rows) {
            return false;
        }

        // update exactly one matching row
        $stmt2 = $db->prepare("UPDATE admin SET a_password=? WHERE a_password=? LIMIT 1");
        $stmt2->bind_param("ss", $new, $old);
        return $stmt2->execute();
    }

    /**
     * (Safer) Change password for a specific admin id.
     */
    public static function changePasswordById(int $adminId, string $old, string $new): bool
    {
        $db = getDBConnection();
        $stmt = $db->prepare("SELECT id FROM admin WHERE id=? AND a_password=? LIMIT 1");
        $stmt->bind_param("is", $adminId, $old);
        $stmt->execute();
        $res = $stmt->get_result();
        if (!$res || !$res->num_rows) {
            return false;
        }
        $stmt2 = $db->prepare("UPDATE admin SET a_password=? WHERE id=?");
        $stmt2->bind_param("si", $new, $adminId);
        return $stmt2->execute();
    }

   
    public static function createAdmin(string $username, string $password, ?string $imgPath): bool
    {
        $db = getDBConnection();
        $stmt = $db->prepare("INSERT INTO admin (a_username, a_password, admin_img) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username, $password, $imgPath);
        return $stmt->execute();
    }

    /**
     * List all admins.
     */
    public static function all()
    {
        $db = getDBConnection();
        return $db->query("SELECT id, a_username, admin_img FROM admin ORDER BY id DESC");
    }

    /**
     * Find one admin by id.
     */
    public static function find(int $id): ?array
    {
        $db = getDBConnection();
        $stmt = $db->prepare("SELECT id, a_username, admin_img FROM admin WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res && $res->num_rows ? $res->fetch_assoc() : null;
    }

    /**
     * Delete an admin by id.
     */
    public static function deleteById(int $id): bool
    {
        $db = getDBConnection();
        $stmt = $db->prepare("DELETE FROM admin WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    /**
     * Update only the image path.
     */
    public static function updateImage(int $id, ?string $relPath): bool
    {
        $db = getDBConnection();
        $stmt = $db->prepare("UPDATE admin SET admin_img=? WHERE id=?");
        $stmt->bind_param("si", $relPath, $id);
        return $stmt->execute();
    }
    // in model/AdminModel.php
    public static function checkLogin(string $username, string $password): ?array
    {
    $db = getDBConnection();
    $stmt = $db->prepare(
        "SELECT id, a_username, admin_img
         FROM admin
         WHERE a_username=? AND a_password=?
         LIMIT 1"
    );
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res && $res->num_rows ? $res->fetch_assoc() : null;
    }
}
