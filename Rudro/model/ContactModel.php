<?php
require_once __DIR__ . '/mydb.php';

class ContactModel {
    public static function countAll() {
        $db = getDBConnection();
        $r = $db->query("SELECT COUNT(*) AS c FROM tblcontactus");
        return (int)($r->fetch_assoc()['c'] ?? 0);
    }

    public static function listFiltered($filter) {
        $db = getDBConnection();
        // Build WHERE safely
        if ($filter === 'done') {
            $sql = "SELECT id, fullname, email, contactno, message, date, IFNULL(status,'notdone') AS status
                    FROM tblcontactus WHERE status='done' ORDER BY id DESC";
            return $db->query($sql);
        } elseif ($filter === 'notdone') {
            $sql = "SELECT id, fullname, email, contactno, message, date, IFNULL(status,'notdone') AS status
                    FROM tblcontactus WHERE status='notdone' OR status IS NULL ORDER BY id DESC";
            return $db->query($sql);
        } else {
            $sql = "SELECT id, fullname, email, contactno, message, date, IFNULL(status,'notdone') AS status
                    FROM tblcontactus ORDER BY id DESC";
            return $db->query($sql);
        }
    }

    public static function updateStatus($id, $status) {
        $db = getDBConnection();
        // whitelist status values
        $status = ($status === 'done') ? 'done' : 'notdone';
        $stmt = $db->prepare("UPDATE tblcontactus SET status=? WHERE id=?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }
}
