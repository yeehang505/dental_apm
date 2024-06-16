<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and new password from the form
    $email = $_POST['email'];
    $newPassword = $_POST['pass'];

    // Check if the email exists in your database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Update the user's password
        $updateSql = "UPDATE users SET password = ? WHERE email = ?";
        $updateStmt = $con->prepare($updateSql);
        $updateStmt->bind_param("ss", $newPassword, $email);
        $updateStmt->execute();

        echo "<script>
                alert('Password reset successful.');
                window.location.href = 'http://localhost/login/login.php';
            </script>"; 
    } 
    else {
        
        echo"<script>
                alert('Email not found. Please enter a valid email address.');
                window.location.href = 'http://localhost/login/passwordreset.php';
            </script>";
    }
}
?>