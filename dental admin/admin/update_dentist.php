<?php
include("includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['record']) && isset($_POST['status'])) {
    $den_id = $_POST['record'];
    $status = $_POST['status'];

    // Update the dentist availability based on the received status
    if ($status == 0 || $status == 1) {
        $update_query = "UPDATE dentist SET availability_id = $status WHERE den_id = $den_id";
        $update_result = mysqli_query($con, $update_query);

        if ($update_result) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "Invalid status value";
    }
} else {
    echo "Invalid request";
}
?>
