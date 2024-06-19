<?php
include "connection.php";
session_start();
$data = array('success' => false, 'msg' => 'Error encounter');

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$apm_time = $_POST['time'];
$remark = $_POST['remark'];
$apm_date = $_POST['date'];
$den_id = (int)$_POST['doctor'];

$apm_status = 0;
$admin_id = 1;
$cust_id = (int)$_SESSION['id'];

$sql = "INSERT INTO appointment (apm_time, apm_date, remark, apm_status, den_id, cust_id, admin_id) VALUES (?,?,?,?,?,?,?)";
$sql_date = "INSERT INTO availability (av_date, av_time, av_status, den_id) VALUES (?,?,?,?)";

$stmt = mysqli_stmt_init($con);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    error_log("SQL error: " . mysqli_error($con));
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "sssiiii", $apm_time, $apm_date, $remark, $apm_status, $den_id, $cust_id, $admin_id);
    mysqli_stmt_execute($stmt);
}

$stmt_date = mysqli_stmt_init($con);

if (!mysqli_stmt_prepare($stmt_date, $sql_date)) {
    error_log("SQL error: " . mysqli_error($con));
    exit();
} else {
    mysqli_stmt_bind_param($stmt_date, "ssii", $apm_date, $apm_time, $apm_status, $den_id);
    mysqli_stmt_execute($stmt_date);
}

$data = array('success' => true, 'msg' => 'Appointment created successfully');

header('Content-Type: application/json');
echo json_encode($data);
?>
