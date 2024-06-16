<?php

// Assuming you have already established a database connection
// $con = mysqli_connect("localhost", "username", "password", "database_name");

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    $admin_email = $_SESSION['admin_email'];

    // Retrieve the role of the logged-in admin from the database
    $get_admin_role = "SELECT admin_role FROM admin WHERE admin_email = '$admin_email'";
    $run_admin_role = mysqli_query($con, $get_admin_role);
    $row_admin_role = mysqli_fetch_assoc($run_admin_role);
    $admin_role = $row_admin_role['admin_role'];

    $_SESSION['admin_role'] = $admin_role;

    // Check if the logged-in admin is the superadmin
    $is_superadmin = ($admin_role === 'superadmin');
?>

<!-- Rest of your HTML code -->

<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Admin
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-money fa-fw"></i> View Admin
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <div class="table-responsive"><!-- table-responsive Starts -->
                    <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->
                        <thead><!-- thead Starts -->
                            <tr>
                                <th>Admin Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Contact</th>
                                <th>Admin role</th> 
                                <?php if ($is_superadmin) { ?>
                                    <th>Edit</th>
                                <?php } ?>
                                <th>Admin Status</th>
                            </tr>
                        </thead><!-- thead Ends -->
                        <tbody><!-- tbody Starts -->
                            <?php
                            $get_admin = "SELECT * FROM admin ORDER BY admin_role ASC";
                            $run_admin = mysqli_query($con, $get_admin);
                            while ($row_admin = mysqli_fetch_array($run_admin)) {
                                $admin_id = $row_admin['admin_id'];
                                $admin_name = $row_admin['admin_name'];
                                $admin_email = $row_admin['admin_email'];
                                $admin_image = $row_admin['admin_image'];
                                $admin_contact = $row_admin['admin_contact'];
                                $admin_role = $row_admin['admin_role'];
                                $admin_status = $row_admin['admin_status'];
                            ?>
                                <tr>
                                    <td><?php echo $admin_name; ?></td>
                                    <td><?php echo $admin_email; ?></td>
                                    <td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60"></td>
                                    <td><?php echo $admin_contact; ?></td>
                                    <td><?php echo $admin_role; ?></td>
                                    <?php if ($is_superadmin) { ?>
                                        <td>
                                        <a href="index.php?edit_user=<?php echo $admin_id; ?>">
                                            <i class="fa fa-pencil"> </i> Edit
                                        </a>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <div id="adminStatus<?php echo $admin_id; ?>">
                                            <?php if ($admin_status == 0) { ?>
                                                <button class="btn btn-danger" onclick="changeAdStatus(<?php echo $admin_id; ?>, 1)">Inactive</button>
                                            <?php } else { ?>
                                                <button class="btn btn-success" onclick="changeAdStatus(<?php echo $admin_id; ?>, 0)">Active</button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody><!-- tbody Ends -->
                    </table><!-- table table-bordered table-hover table-striped Ends -->
                </div><!-- table-responsive Ends -->

            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->

<!-- Rest of your HTML code -->

<script>
  function changeAdStatus(id, status) {
    $.ajax({
        url: "update_user.php",
        method: "post",
        data: { record: id, status: status },
        success: function (data) {
            alert('Status updated successfully');
            $('form').trigger('reset');
            // Reload the page to reflect the updated status
            window.location.reload();
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
  }
</script>

<?php } ?>
