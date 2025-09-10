<?php
    include_once 'dbConnection.php';

    function getDoctor($email, $password){
        $con = getConnection();
        $sql = "SELECT id, specilization, doctorName, address, docFees, contactno, docEmail, doctor_img FROM doctors WHERE docEmail='$email' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        } else {
            return null;
        }
    }

    function getDoctorPassword($doctorId){
        $con = getConnection();
        $sql = "SELECT password FROM doctors WHERE id='$doctorId'";
        $result = mysqli_query($con, $sql);

        if($row = mysqli_fetch_assoc($result)){
            return $row['password'];
        } else {
            return null;
        }
    }

    function updateDoctorPassword($doctorId, $newPassword){
        $con = getConnection();
        $sql = "UPDATE doctors SET password='$newPassword' WHERE id='$doctorId'";
        return mysqli_query($con, $sql);
    }

    function getAppointmentHistory($doctorId){
        $con = getConnection();
        $sql = "SELECT id, doctorSpecilization, doctorId, userId, consultancyFees, appointmentDate, appointmentTime 
                FROM appointment 
                WHERE doctorId='$doctorId'";
        $result = mysqli_query($con, $sql);
        $apHistory = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $apHistory[] = $row;
            }
        }
        return $apHistory;
    }

    
?>