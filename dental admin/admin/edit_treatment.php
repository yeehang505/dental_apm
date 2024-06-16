<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    include("includes/db.php");

    if (isset($_GET['edit_treatment'])) {
        $edit_id = $_GET['edit_treatment'];

        $get_treatment = "SELECT * FROM treatment WHERE treat_id='$edit_id'";
        $run_treatment = mysqli_query($con, $get_treatment);
        $row_treatment = mysqli_fetch_array($run_treatment);

        $treat_id = $row_treatment['treat_id'];
        $treat_name = $row_treatment['treat_name'];
        $treat_cost = $row_treatment['treat_cost'];
        $treat_time = $row_treatment['treat_time'];
    }

    if (isset($_POST['update'])) {
        $treat_name = $_POST['treat_name'];
        $treat_cost = $_POST['treat_cost'];
        $treat_time = $_POST['treat_time'];

        $update_treatment = "UPDATE treatment SET treat_name='$treat_name', treat_cost='$treat_cost', treat_time='$treat_time' WHERE treat_id='$treat_id'";
        $run_update = mysqli_query($con, $update_treatment);

        if ($run_update) {
            echo "<script>alert('Treatment has been updated successfully')</script>";
            echo "<script>window.open('index.php?view_treatment','_self')</script>";
        } else {
            echo "<script>alert('Error updating treatment')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Treatment</title>
    <link rel="stylesheet" href="path_to_your_css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Treatment
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Edit Treatment
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Treatment Name</label>
                            <div class="col-md-6">
                                <input type="text" name="treat_name" class="form-control" required value="<?php echo $treat_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Treatment Cost</label>
                            <div class="col-md-6">
                                <input type="number" name="treat_cost" class="form-control" required value="<?php echo $treat_cost; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Treatment Time</label>
                            <div class="col-md-6">
                                <input type="time" name="treat_time" class="form-control" required value="<?php echo $treat_time; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" name="update" class="btn btn-primary">Update Treatment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="path_to_your_js/jquery.min.js"></script>
<script src="path_to_your_js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>
