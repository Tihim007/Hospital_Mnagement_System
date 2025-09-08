<?php
require_once __DIR__ . '/mydb.php';

class AdminModel {
    public static function checkLogin($username, $password) {
        $db = getDBConnection();
        // NOTE: keeping plaintext check to match your existing behavior
        $stmt = $db->prepare("SELECT id FROM admin WHERE a_username=? AND a_password=? LIMIT 1");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute(); $res = $stmt->get_result();
        return $res->fetch_assoc();
    }

    public static function changePassword($old, $new) {
        $db = getDBConnection();
        // match existing column names (a_password)
        $stmt = $db->prepare("SELECT id FROM admin WHERE a_password=? LIMIT 1");
        $stmt->bind_param("s", $old);
        $stmt->execute(); $res = $stmt->get_result();
        if (!$res->fetch_assoc()) return false;

        $stmt2 = $db->prepare("UPDATE admin SET a_password=? LIMIT 1");
        $stmt2->bind_param("s", $new);
        return $stmt2->execute();
    }
}
