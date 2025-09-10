<?php
require_once __DIR__ . '/mydb.php';

class AppointmentModel {
    public static function historyAll() {
        $db = getDBConnection();
        return $db->query("SELECT * FROM appointment ORDER BY id DESC");
    }

    public static function countAll() {
        $db = getDBConnection();
        $r = $db->query("SELECT COUNT(*) AS c FROM appointment");
        return (int)($r->fetch_assoc()['c'] ?? 0);
    }

    public static function countDistinctPatients() {
        $db = getDBConnection();
        $r = $db->query("SELECT COUNT(DISTINCT userId) AS c FROM appointment");
        return (int)($r->fetch_assoc()['c'] ?? 0);
    }
    public static function delete($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("DELETE FROM appointment WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

