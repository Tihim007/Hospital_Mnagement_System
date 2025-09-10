<?php
    session_start();
    include_once '../model/doctorModel.php';
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if($oldPassword == getDoctorPassword($_SESSION['doctorId'])){
        if($newPassword == $confirmPassword){
            if(updateDoctorPassword($_SESSION['doctorId'], $newPassword)){
                echo "<script>alert('Password updated successfully'); window.location.href='../view/doctorProfile.php';</script>";
            } else {
                echo "<script>alert('Failed to update password'); window.location.href='../view/doctorProfile.php';</script>";
            }
        } else {
            echo "<script>alert('New passwords do not match'); window.location.href='../view/doctorProfile.php';</script>";
        }
    }
     else {
        echo "<script>alert('Old password is incorrect'); window.location.href='../view/doctorProfile.php';</script>";
    }
?>