<?php
include "connection.php";
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the customer ID from the session
    $customerId = $_SESSION['id'];
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNo = $_POST['contact'];
    $ic = $_POST['ic'];

    // Update the customer information in the database
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "UPDATE customer SET name = ?, email = ?, contact_no = ?, ic = ? WHERE cust_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssssi', $name, $email, $contactNo, $ic, $customerId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Update successful
        $data = array('success' => true, 'msg' => 'Profile updated successfully');
    } else {
        // Update failed
        $data = array('success' => false, 'msg' => 'Error encountered during profile update');
    }

    $stmt->close();
    $con->close();

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Invalid request method
    http_response_code(405);
    $data = array('success' => false, 'msg' => 'Method not allowed');
    header('Content-Type: application/json');
    echo json_encode($data);
}
