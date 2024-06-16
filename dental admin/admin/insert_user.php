<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <div class="row"><!-- 1 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <ol class="breadcrumb"><!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Admin
                </li>
            </ol><!-- breadcrumb Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->
        <div class="col-lg-12"><!-- col-lg-12 Starts -->
            <div class="panel panel-default"><!-- panel panel-default Starts -->
                <div class="panel-heading"><!-- panel-heading Starts -->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Admin
                    </h3>
                </div><!-- panel-heading Ends -->
                <div class="panel-body"><!-- panel-body Starts -->
                    <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Admin Name: </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="admin_name" class="form-control" required pattern="^[^0-9]+$">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Admin Email: </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="admin_email" class="form-control" required pattern="[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Admin Password: </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="password" name="admin_pass" class="form-control" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?\:{}|<>])\S{8,}$">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Admin Contact: </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="text" name="admin_contact" class="form-control" maxlength="12" required pattern="[0-9-]{1,12}">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label">Admin Image: </label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                                <input type="file" name="admin_image" class="form-control" required>
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6"><!-- col-md-6 Starts -->
                               <input type="submit" name="submit" value="Insert Admin" class="btn btn-primary form-control">
                            </div><!-- col-md-6 Ends -->
                        </div><!-- form-group Ends -->
                    </form><!-- form-horizontal Ends -->
                </div><!-- panel-body Ends -->
            </div><!-- panel panel-default Ends -->
        </div><!-- col-lg-12 Ends -->
    </div><!-- 2 row Ends -->

<?php

    if (!preg_match("/^[A-Za-z ]*$/", $admin_name)) {
        echo "<script>alert('Name should not contain numbers')</script>";
        exit();
    }

    // Validate contact number (should not contain alphabet and maximum 12 numbers)
  if (!preg_match("/^[0-9-]{1,12}$/", $admin_contact)) {
    echo "<script>alert('Contact number should not contain alphabet and must be a maximum of 12 numbers')</script>";
    exit();
  }

    function validatePassword($password)
    {
        // Function for validating the password
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        $minLength = strlen($password) >= 8;

        if (!$uppercase || !$lowercase || !$number || !$specialChars || !$minLength) {
            return false;
        }

        return true;
    }

    // Initialize variables to store the user's input
    $admin_name = "";
    $admin_email = "";
    $admin_contact = "";

    if (isset($_POST['submit'])) {
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];
        $admin_contact = $_POST['admin_contact'];
        $admin_image = $_FILES['admin_image']['name'];
        $temp_admin_image = $_FILES['admin_image']['tmp_name'];

        // Validate email format
        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            return;
        }

        // Validate password strength
        if (!validatePassword($admin_pass)) {
            echo '<script> alert("Password should be at least 8 characters in length and should include at least one uppercase letter, one lowercase letter, one number, and one special character.")</script>';
            return;
        }

        // Check if the admin name already exists
        $check_name_query = "SELECT * FROM adminss WHERE admin_name = '$admin_name'";
        $check_name_result = mysqli_query($con, $check_name_query);
        if (mysqli_num_rows($check_name_result) > 0) {
            echo '<script> alert("Admin with the same name already exists. Please choose a different name.")</script>';
            return;
        }

        // Check if the admin email already exists
        $check_email_query = "SELECT * FROM adminss WHERE admin_email = '$admin_email'";
        $check_email_result = mysqli_query($con, $check_email_query);
        if (mysqli_num_rows($check_email_result) > 0) {
            echo '<script> alert("Admin with the same email already exists. Please choose a different email.")</script>';
            return;
        }

        // Check if the admin contact already exists
        $check_contact_query = "SELECT * FROM adminss WHERE admin_contact = '$admin_contact'";
        $check_contact_result = mysqli_query($con, $check_contact_query);
        if (mysqli_num_rows($check_contact_result) > 0) {
            echo '<script> alert("Admin with the same contact number already exists. Please choose a different contact number.")</script>';
            return;
        }

        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

        $insert_admin = "INSERT INTO admins (admin_name, admin_email, admin_pass, admin_image, admin_contact) VALUES ('$admin_name', '$admin_email', '$admin_pass', '$admin_image', '$admin_contact')";

        $run_admin = mysqli_query($con, $insert_admin);

        if ($run_admin) {
            $current_admin_email = $_SESSION['admin_email'];

            echo "<script>document.getElementsByName('admin_email')[0].disabled = true;</script>";

            echo "<script>alert('One Admin Has Been Inserted successfully')</script>";

            echo "<script>window.open('index.php?view_users','_self')</script>";
        }
    }
}
?>
