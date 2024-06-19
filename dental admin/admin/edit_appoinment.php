<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

    if (isset($_GET['edit_appoinment'])) {
        $edit_id = $_GET['edit_appoinment'];

        $get_appt = "SELECT * FROM appointment WHERE apm_id='$edit_id'";
        $run_edit = mysqli_query($con, $get_appt);
        $row_edit = mysqli_fetch_array($run_edit);

        $apm_id = $row_edit['apm_id'];
        $apm_time = $row_edit['apm_time'];
        $apm_date = $row_edit['apm_date'];
        $remark = $row_edit['remark'];
        $apm_status = $row_edit['apm_status'];
        $den_id = $row_edit['den_id'];
        $cust_id = $row_edit['cust_id'];
        $admin_id = $row_edit['admin_id'];
    }

    $get_dentist = "SELECT * FROM dentist WHERE den_id='$den_id'";
    $run_dentist = mysqli_query($con, $get_dentist);
    $row_dentist = mysqli_fetch_array($run_dentist);
    $den_name = $row_dentist['den_name'];

    $get_customer = "SELECT * FROM customer WHERE cust_id='$cust_id'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $cust_name = $row_customer['name'];

    $get_admin = "SELECT * FROM admin WHERE admin_id='$admin_id'";
    $run_admin = mysqli_query($con, $get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_name = $row_admin['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'#remark' });</script>
</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Appointment
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Appointment
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Appointment Time</label>
                        <div class="col-md-6">
                            <input type="time" name="apm_time" class="form-control" required value="<?php echo $apm_time; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Appointment Date</label>
                        <div class="col-md-6">
                            <input type="date" name="apm_date" class="form-control" required value="<?php echo $apm_date; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Remark</label>
                        <div class="col-md-6">
                            <textarea name="remark" class="form-control" rows="15" id="remark"><?php echo $remark; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Appointment Status</label>
                        <div class="col-md-6">
                            <select class="form-control" name="apm_status" required>
                                <option value="<?php echo $apm_status; ?>"><?php echo $apm_status; ?></option>
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
                                <option value="<?php echo $den_id; ?>"><?php echo $den_name; ?></option>
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
                                <option value="<?php echo $cust_id; ?>"><?php echo $cust_name; ?></option>
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
                                <option value="<?php echo $admin_id; ?>"><?php echo $admin_name; ?></option>
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
                            <input name="update" type="submit" class="btn btn-primary form-control" value="Update Appointment">
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

if (isset($_POST['update'])) {
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
        $update_appointment = "UPDATE appointment SET apm_time='$apm_time', apm_date='$apm_date', remark='$remark', apm_status='$apm_status', den_id='$den_id', cust_id='$cust_id', admin_id='$admin_id' WHERE apm_id='$apm_id'";

        $run_update_appointment = mysqli_query($con, $update_appointment);

        if ($run_update_appointment) {
            echo "<script>alert('Appointment has been updated successfully')</script>";
            echo "<script>window.open('index.php?view_appoinment','_self')</script>";
        } else {
            echo "<script>alert('Error updating appointment')</script>";
        }
    }
}

?>

<?php } ?>
