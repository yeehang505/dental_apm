<?php
include "connection.php";
$data = array('success' => false, 'msg' => 'Error encounter');

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$apm_time = $_POST['time'];
$remark = $_POST['remark'];
$apm_date = $_POST['date'];
$apm_status = 0;
// $den_id = $_POST['den_id'];
// $cust_id = $_POST['cust_id'];
$admin_id = 1;
$cust_id = 1;
$den_id = 1;

$sql = "INSERT INTO appoinment (apm_time, apm_date, remark, apm_status, den_id, cust_id, admin_id) VALUES (?,?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    error_log("SQL error: " . mysqli_error($conn));
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "sssiiii", $apm_time, $apm_date, $remark, $apm_status, $den_id, $cust_id, $admin_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = array('success' => true, 'msg' => 'Appointment created successfully');

}
header('Content-Type: application/json');
echo json_encode($data);
?>

