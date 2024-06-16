<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    include("includes/db.php");

    if (isset($_POST['add_treatment'])) {
        $treat_name = $_POST['treat_name'];
        $treat_cost = $_POST['treat_cost'];
        $treat_time = $_POST['treat_time'];

        $insert_treatment = "INSERT INTO treatment (treat_name, treat_cost, treat_time) VALUES ('$treat_name', '$treat_cost', '$treat_time')";

        $run_insert = mysqli_query($con, $insert_treatment);

        if ($run_insert) {
            echo "<script>alert('New treatment has been added successfully')</script>";
            echo "<script>window.open('index.php?view_treatment','_self')</script>";
        } else {
            echo "<script>alert('Error adding new treatment')</script>";
        }
    }
}
?>
