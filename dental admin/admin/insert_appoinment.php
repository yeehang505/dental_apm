<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Insert Appointment</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js">

    </script>

</head>

<body>
    <div class="row">
        <!-- row Starts -->

        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->
            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->

                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Appointment
                </li>

            </ol>
            <!-- breadcrumb Ends -->

        </div>
        <!-- col-lg-12 Ends -->

    </div>
    <!-- row Ends -->


    <div class="row">
        <!-- 2 row Starts -->
        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->
            <div class="panel panel-default">
                <!-- panel panel-default Starts -->
                <div class="panel-heading">
                    <!-- panel-heading Starts -->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Appointment
                    </h3>

                </div>
                <!-- panel-heading Ends -->
                <div class="panel-body">
    <!-- panel-body Starts -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <!-- form-horizontal Starts -->

        <div class="form-group">
            <!-- form-group Starts -->
            <label class="col-md-3 control-label">Appointment Time</label>
            <div class="col-md-6">
                <input type="time" name="apm_time" class="form-control" required>
            </div>
        </div>
        <!-- form-group Ends -->

        <div class="form-group">
            <label class="col-md-3 control-label">Appointment Date</label>
            <div class="col-md-6">
                <input type="date" name="apm_date" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Remark</label>
            <div class="col-md-6">
                <input type="text" name="remark" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Appointment Status</label>
            <div class="col-md-6">
                <select class="form-control" name="apm_status" required>
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Dentist</label>
            <div class="col-md-6">
                <select class="form-control" name="den_id" required>
                    <option value="">Select Dentist</option>
                    <?php
                    $get_dentists = "SELECT den_id, den_name FROM dentist";
                    $run_dentists = mysqli_query($con, $get_dentists);
                    while ($row_dentists = mysqli_fetch_array($run_dentists)) {
                        echo "<option value='" . $row_dentists['den_id'] . "'>" . $row_dentists['den_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Customer</label>
            <div class="col-md-6">
                <select class="form-control" name="cust_id" required>
                    <option value="">Select Customer</option>
                    <?php
                    $get_customers = "SELECT cust_id, name FROM customer";
                    $run_customers = mysqli_query($con, $get_customers);
                    while ($row_customers = mysqli_fetch_array($run_customers)) {
                        echo "<option value='" . $row_customers['cust_id'] . "'>" . $row_customers['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Admin</label>
            <div class="col-md-6">
                <select class="form-control" name="admin_id" required>
                    <option value="">Select Admin</option>
                    <?php
                    $get_admins = "SELECT admin_id, admin_name FROM admin";
                    $run_admins = mysqli_query($con, $get_admins);
                    while ($row_admins = mysqli_fetch_array($run_admins)) {
                        echo "<option value='" . $row_admins['admin_id'] . "'>" . $row_admins['admin_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group" style="display: flex; justify-content: center">
            <div class="col-md-3">
                <input name="submit" type="submit" class="btn btn-primary form-control" value="Insert Appointment">
            </div>
        </div>


    </form>
</div>


            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $apm_time = $_POST['apm_time'];
    $apm_date = $_POST['apm_date'];
    $remark = $_POST['remark'];
    $apm_status = $_POST['apm_status'];
    $den_id = $_POST['den_id'];
    $cust_id = $_POST['cust_id'];
    $admin_id = $_POST['admin_id'];

    // Validate the date
    $current_date = date('Y-m-d');
    if ($apm_date < $current_date) {
        echo "<script>alert('Appointment date must be in the future.')</script>";
    } else {
        $insert_appoinment = "INSERT INTO appointment (apm_time, apm_date, remark, apm_status, den_id, cust_id, admin_id)
        VALUES ('$apm_time', '$apm_date', '$remark', '$apm_status', '$den_id', '$cust_id', '$admin_id')";

        $run_insert_appointment = mysqli_query($con, $insert_appoinment);

        if ($run_insert_appointment) {
            echo "<script>alert('Appointment Inserted')</script>";
            echo "<script>window.open('index.php?insert_appoinment','_self')</script>";
        } else {
            echo "<script>alert('Error inserting appointment')</script>";
        }
    }
}

?>

<?php }
