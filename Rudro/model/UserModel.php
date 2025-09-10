<?php
require_once __DIR__ . '/mydb.php';

class UserModel {
    public static function all() {
        $db = getDBConnection();
        return $db->query("SELECT * FROM user ORDER BY id ASC");
    }
    public static function find($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("SELECT * FROM user WHERE id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function update($id, $u) {
        $db = getDBConnection();
        $stmt = $db->prepare("UPDATE user SET fullName=?, address=?, city=?, gender=?, email=?, password=?, contactno=? WHERE id=?");
        $stmt->bind_param("sssssssi",
            $u['fullName'], $u['address'], $u['city'], $u['gender'], $u['email'], $u['password'], $u['contactno'], $id
        );
        return $stmt->execute();
    }
    public static function delete($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("DELETE FROM user WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function count() {
        $db = getDBConnection();
        $r = $db->query("SELECT COUNT(*) c FROM user"); return $r->fetch_assoc()['c'];
    }
}
