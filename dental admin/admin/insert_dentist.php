<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Insert Dentist</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
</head>

<body>
    <div class="row">
        <!-- row Starts -->
        <div class="col-lg-12">
            <!-- col-lg-12 Starts -->
            <ol class="breadcrumb">
                <!-- breadcrumb Starts -->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Dentist
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
                        <i class="fa fa-money fa-fw"></i> Insert Dentist
                    </h3>
                </div>
                <!-- panel-heading Ends -->
                <div class="panel-body">
                    <!-- panel-body Starts -->
                    <!-- HTML form for adding a new dentist -->
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="den_name">Dentist Name:</label>
                            <input type="text" class="form-control" name="den_name" required>
                        </div>
                        <div class="form-group">
                            <label for="den_contact">Contact Number:</label>
                            <input type="text" class="form-control" name="den_contact" required>
                        </div>
                        <div class="form-group">
                            <label for="den_email">Email:</label>
                            <input type="email" class="form-control" name="den_email" required>
                        </div>
                        <div class="form-group">
                            <label for="specification">Specification:</label><br>
                            <select class="form-control" name="specification" required>
                                <option value="">Select Specification</option>
                                <option value="general">General</option>
                                <option value="orthodontist">Orthodontist</option>
                                <option value="pedodontist">Pedodontist</option>
                                <option value="periodontist">Periodontist</option>
                                <option value="cosmetic Dentist">Cosmetic Dentist</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Add Dentist</button>
                    </form>
                    <!-- HTML form Ends -->
                </div>
                <!-- panel-body Ends -->
            </div>
            <!-- panel panel-default Ends -->
        </div>
        <!-- col-lg-12 Ends -->
    </div>
    <!-- 2 row Ends -->

</body>

<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $den_name = $_POST['den_name'];
    $den_contact = $_POST['den_contact'];
    $den_email = $_POST['den_email'];
    $specification = $_POST['specification'];

    // Insert data into the dentist table
    $insert_dentist_query = "INSERT INTO dentist (den_name, den_contact, den_email, specification) 
                             VALUES ('$den_name', '$den_contact', '$den_email', '$specification')";
    $insert_dentist_result = mysqli_query($con, $insert_dentist_query);

    // Check if the insertion was successful
    if ($insert_dentist_result) {
        echo "<script>alert('Dentist added successfully')</script>";
        echo "<script>window.open('index.php?view_dentist','_self')</script>";
    } else {
        echo "<script>alert('Error adding dentist: " . mysqli_error($con) . "')</script>";
    }
}
?>


</html>

<?php
}
?>
