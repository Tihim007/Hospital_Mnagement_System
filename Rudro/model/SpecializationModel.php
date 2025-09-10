<?php
require_once __DIR__ . '/mydb.php';

class SpecializationModel {
    public static function all() {
        $db = getDBConnection();
        return $db->query("SELECT * FROM doctorspecilization ORDER BY id ASC");
    }
    public static function find($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("SELECT * FROM doctorspecilization WHERE id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function create($spec) {
        $db = getDBConnection();
        $stmt = $db->prepare("INSERT INTO doctorspecilization(specilization) VALUES(?)");
        $stmt->bind_param("s", $spec);
        return $stmt->execute();
    }
    public static function update($id, $spec) {
        $db = getDBConnection();
        $stmt = $db->prepare("UPDATE doctorspecilization SET specilization=? WHERE id=?");
        $stmt->bind_param("si", $spec, $id);
        return $stmt->execute();
    }
    public static function delete($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("DELETE FROM doctorspecilization WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function count() {
        $db = getDBConnection();
        $r = $db->query("SELECT COUNT(*) c FROM doctorspecilization"); return $r->fetch_assoc()['c'];
    }
}
