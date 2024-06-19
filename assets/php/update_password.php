<?php

session_start();
include 'connection.php';
// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];

    // Prepare and execute the SQL query to fetch the user's current password
    $stmt = $con->prepare('SELECT cust_pass FROM customer WHERE cust_id = ?');
    $stmt->bind_param('s', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($dbCurrentPassword);
    $stmt->fetch();
    $stmt->close();
    if ($dbCurrentPassword !== $currentPassword) {
        // Current password is incorrect
        $data = array('success' => false, 'msg' => 'Current password is incorrect');
        // Close the database connection
        $con->close();
        // Return success message as JSON
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
    // Hash the new password
    // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to update the user's password
    $stmt = $con->prepare('UPDATE customer SET cust_pass = ? WHERE cust_id = ?');
    $stmt->bind_param('ss', $newPassword, $_SESSION['id']);
    $stmt->execute();
    // Check affected rows before closing the statement
    $affectedRows = $stmt->affected_rows;
    $stmt->close();
    if ($affectedRows > 0) {
        // Password updated successfully
        $data = array('success' => true, 'msg' => 'Password updated successfully');
        // Close the database connection
        $con->close();
    }else{
        $data = array('success' => false, 'msg' => 'Error encountered during password update');
    }
    // Return success message as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}
