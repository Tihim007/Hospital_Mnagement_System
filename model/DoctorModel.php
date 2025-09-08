<?php
require_once __DIR__ . '/mydb.php';

class DoctorModel {
    public static function all() {
        $db = getDBConnection();
        return $db->query("SELECT * FROM doctors ORDER BY id ASC");
    }
    public static function find($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("SELECT * FROM doctors WHERE id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function create($data) {
        $db = getDBConnection();
        $stmt = $db->prepare("INSERT INTO doctors(specilization, doctorName, address, docFees, contactno, docEmail, password)
                              VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss",
            $data['specilization'], $data['doctorName'], $data['address'], $data['docFees'],
            $data['contactno'], $data['docEmail'], $data['password']
        );
        return $stmt->execute();
    }
    public static function update($id, $data) {
        $db = getDBConnection();
        $stmt = $db->prepare("UPDATE doctors SET specilization=?, doctorName=?, address=?, docFees=?, contactno=?, docEmail=?, password=? WHERE id=?");
        $stmt->bind_param("sssssssi",
            $data['specilization'], $data['doctorName'], $data['address'], $data['docFees'],
            $data['contactno'], $data['docEmail'], $data['password'], $id
        );
        return $stmt->execute();
    }
    public static function delete($id) {
        $db = getDBConnection();
        $stmt = $db->prepare("DELETE FROM doctors WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function count() {
        $db = getDBConnection();
        $r = $db->query("SELECT COUNT(*) c FROM doctors"); return $r->fetch_assoc()['c'];
    }
}
