<?php
require_once __DIR__ . '/mydb.php';

class PatientModel {
    public static function all() {
        $db = getDBConnection();
        return $db->query("SELECT * FROM tblpatient ORDER BY ID ASC");
    }
    public static function find($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("SELECT * FROM tblpatient WHERE ID=?");
        $stmt->bind_param("i", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function update($id, $d) {
        $db = getDBConnection();
        $stmt = $db->prepare("UPDATE tblpatient SET Docid=?, PatientName=?, PatientContno=?, PatientEmail=?, PatientGender=?, PatientAdd=?, PatientAge=?, PatientMedhis=? WHERE ID=?");
        $stmt->bind_param("isssssssi",
            $d['Docid'], $d['PatientName'], $d['PatientContno'], $d['PatientEmail'],
            $d['PatientGender'], $d['PatientAdd'], $d['PatientAge'], $d['PatientMedhis'], $id
        );
        return $stmt->execute();
    }
    public static function delete($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("DELETE FROM tblpatient WHERE ID=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function count() {
        $db = getDBConnection();
        $r = $db->query("SELECT COUNT(*) c FROM tblpatient"); return $r->fetch_assoc()['c'];
    }
}
