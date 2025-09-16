<?php
    include_once 'dbConnection.php';

    function addPatient($name, $age, $gender, $number, $email, $doctorId, $comment) {
        $conn = getConnection();
        $stmt = "INSERT INTO patients (name, age, gender, number, email, doctorId, comment) VALUES ('$name', $age, '$gender', '$number', '$email', $doctorId, '$comment')";
        if ($conn->query($stmt) === TRUE) {
            echo "<script>alert('Patient added successfully'); window.location.href='../view/doctorProfile.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt . "<br>" . $conn->error . "'); window.location.href='../view/addPatient.php';</script>";
        }
    }

    function getPatientsByDoctor($doctorId) {
        $conn = getConnection();
        $stmt = "SELECT * FROM patients WHERE doctorId = $doctorId";
        $result = $conn->query($stmt);
        $patients = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $patients[] = $row;
            }
        }
        return $patients;
    }

    function getPatientById($patientId) {
        $conn = getConnection();
        $stmt = "SELECT * FROM patients WHERE id = $patientId";
        $result = $conn->query($stmt);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    function updatePatient($patientId, $name, $age, $gender, $number, $email, $comment) {
        $conn = getConnection();
        $stmt = "UPDATE patients SET name='$name', age='$age', gender='$gender', number='$number', email='$email', comment='$comment' WHERE id=$patientId";
        if ($conn->query($stmt) === TRUE) {
        } else {
             
        }
?>