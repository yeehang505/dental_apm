<?php
session_start();

if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
    unset($_SESSION['user_role']);
    $response = ['success' => true, 'message' => 'You are logged out'];
}else{
    $response = ['success' => false, 'message' => 'You are not logged in'];
}
echo json_encode($response);
