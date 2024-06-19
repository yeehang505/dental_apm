<?php
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login page if admin is not logged in
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    exit();
}

// Include database connection
include("includes/db.php");

// Check if edit dentist ID is set
if (!isset($_GET['edit_dentist'])) {
    echo "<script>window.open('index.php','_self')</script>";
    exit();
} else {
    $edit_id = $_GET['edit_dentist'];

    // Fetch dentist details based on edit_id
    $get_dentist_query = "SELECT * FROM dentist WHERE den_id='$edit_id'";
    $run_edit = mysqli_query($con, $get_dentist_query);
    $row_edit = mysqli_fetch_array($run_edit);

    $den_id = $row_edit['den_id'];
    $den_name = $row_edit['den_name'];
    $den_contact = $row_edit['den_contact'];
    $den_email = $row_edit['den_email'];
    $specification = $row_edit['specification'];
    $availability_id = $row_edit['availability_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Dentist</title>
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
                    <input type="text" class="form-control" name="den_name" value="<?php echo $den_name; ?>" required>
                    <div class="form-group">
                        <label for="den_contact">Contact Number:</label>
                        <input type="text" class="form-control" name="den_contact" value="<?php echo $den_contact; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="den_email">Email:</label>
                        <input type="email" class="form-control" name="den_email" value="<?php echo $den_email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="specification">Specification:</label>
                        <select class="form-control" name="specification" required>
                            <option value="">Select Specification</option>
                            <option value="General" <?php if ($specification == 'General') echo 'selected'; ?>>General</option>
                            <option value="Orthodontist" <?php if ($specification == 'Orthodontist') echo 'selected'; ?>>Orthodontist</option>
                            <option value="Pedodontist" <?php if ($specification == 'Pedodontist') echo 'selected'; ?>>Pedodontist</option>
                            <option value="Periodontist" <?php if ($specification == 'Periodontist') echo 'selected'; ?>>Periodontist</option>
                            <option value="Cosmetic Dentist" <?php if ($specification == 'Cosmetic Dentist') echo 'selected'; ?>>Cosmetic Dentist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="availability_id">Availability Status:</label>
                        <select class="form-control" name="availability_id" required>
                            <option value="1" <?php if ($availability_id == 1) echo 'selected'; ?>>Available</option>
                            <option value="0" <?php if ($availability_id == 0) echo 'selected'; ?>>Not Available</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_dentist">Update Dentist</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
// Check if the update dentist form is submitted
if (isset($_POST['update_dentist'])) {
    // Retrieve form data
    $den_name = $_POST['den_name'];
    $den_contact = $_POST['den_contact'];
    $den_email = $_POST['den_email'];
    $specification = $_POST['specification'];
    $availability_id = $_POST['availability_id'];

    // Update dentist details in the database
    $update_query = "UPDATE dentist SET den_name='$den_name', den_contact='$den_contact', den_email='$den_email', specification='$specification', availability_id='$availability_id' WHERE den_id='$den_id'";
    $update_result = mysqli_query($con, $update_query);

    // Check if the update was successful
    if ($update_result) {
        echo "<script>alert('Dentist details updated successfully')</script>";
        echo "<script>window.open('index.php?view_dentist','_self')</script>";
    } else {
        echo "<script>alert('Failed to update dentist details')</script>";
    }
}
?>
