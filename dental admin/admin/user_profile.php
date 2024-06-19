<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<?php
if(isset($_GET['user_profile'])){
    $edit_id = $_GET['user_profile'];

    $get_admin = "SELECT * FROM admin WHERE admin_id='$edit_id'";
    $run_admin = mysqli_query($con, $get_admin);
    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_email = $row_admin['admin_email'];
    $admin_pass = $row_admin['admin_pass'];
    $admin_image = $row_admin['admin_image'];
    $new_admin_image = $row_admin['admin_image'];
    $admin_contact = $row_admin['admin_contact'];
}
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Admin Profile
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Admin Profile
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Email: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_pass" class="form-control" required value="<?php echo $admin_pass; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Contact: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control" required pattern="[0-9-]{1,12}" maxlength="12" value="<?php echo $admin_contact; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Image: </label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" class="form-control">
                            <br>
                            <img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Admin" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['update'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_contact = $_POST['admin_contact'];
    $admin_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];

    if (!preg_match("/^[A-Za-z ]*$/", $admin_name)) {
        echo "<script>alert('Name should not contain numbers')</script>";
        exit();
    }

    $password_regex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?\":{}|<>])\S{8,}$/";
    if (!preg_match($password_regex, $admin_pass)) {
        echo "<script>alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character')</script>";
        exit();
    }

    if (!preg_match("/^[0-9-]{1,12}$/", $admin_contact)) {
        echo "<script>alert('Contact number should not contain alphabet and must be a maximum of 12 numbers')</script>";
        exit();
    }

    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

    if (empty($admin_image)) {
        $admin_image = $new_admin_image;
    }

    // Check for unique email and contact number
    $check_email = "SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_id != '$admin_id'";
    $run_check_email = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_check_email) > 0) {
        echo "<script>alert('This email is already associated with another admin')</script>";
        exit();
    }

    $check_contact = "SELECT * FROM admin WHERE admin_contact='$admin_contact' AND admin_id != '$admin_id'";
    $run_check_contact = mysqli_query($con, $check_contact);
    if (mysqli_num_rows($run_check_contact) > 0) {
        echo "<script>alert('This contact number is already associated with another admin')</script>";
        exit();
    }

    $update_admin = "UPDATE admin SET admin_name='$admin_name', admin_email='$admin_email', admin_pass='$admin_pass', admin_image='$admin_image', admin_contact='$admin_contact' WHERE admin_id='$admin_id'";

    $run_admin = mysqli_query($con, $update_admin);

    if($run_admin){
        echo "<script>alert('User Has Been Updated successfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}
?>

<?php } ?>
