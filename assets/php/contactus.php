<?php
include "connection.php";

$data = array('success' => false, 'msg' => 'Error encounter');

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$msg1 = "From " . $name . ",\r\n" . $message;

$to = "mmu.tse12345@gmail.com"; //receiver

if (mail($to, $subject, $msg1, $to)) {
    $data = array('success' => true, 'msg' => 'Message sent successfully');
} else {
    $data = array('success' => false, 'msg' => 'Message not sent, Error encounter.');
}

header('Content-Type: application/json');
echo json_encode($data);
