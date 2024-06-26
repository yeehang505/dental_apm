<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<div class="row">
    <!-- 1 row Starts -->
    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->
        <ol class="breadcrumb">
            <!-- breadcrumb Starts -->
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Appointment
            </li>
        </ol>
        <!-- breadcrumb Ends -->
    </div>
    <!-- col-lg-12 Ends -->
</div>
<!-- 1 row Ends -->

<div class="row">
    <!-- 2 row Starts -->
    <div class="col-lg-12">
        <!-- col-lg-12 Starts -->
        <div class="panel panel-default">
            <!-- panel panel-default Starts -->
            <div class="panel-heading">
                <!-- panel-heading Starts -->
                <h3 class="panel-title">
                    <!-- panel-title Starts -->
                    <i class="fa fa-money fa-fw"></i> View Appointment
                </h3>
                <!-- panel-title Ends -->
            </div>
            <!-- panel-heading Ends -->

            <div class="panel-body">
                <!-- panel-body Starts -->
                <div class="table-responsive">
                    <!-- table-responsive Starts -->
                    <table class="table table-bordered table-hover table-striped">
                        <!-- table table-bordered table-hover table-striped Starts -->
                        <thead>
                            <!-- thead Starts -->
                            <tr>
                                <th>#</th>
                                <th>Appointment Time</th>
                                <th>Appointment Date</th>
                                <th>Remark</th>
                                <th>Dentist Name</th>
                                <th>Customer Name</th>
                                <th>Admin Name</th>
                                <th>Appointment Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <!-- thead Ends -->

                        <tbody>
                            <!-- tbody Starts -->
                            <?php
                            $limit = 10; // Number of customers per page
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;

            $get_a = "SELECT *, CASE WHEN apm_status = 0 THEN 'Pending' WHEN apm_status = 1 THEN 'Confirmed' WHEN apm_status = 2 THEN 'Cancelled' WHEN apm_status = 3 THEN 'Rejected' END as apm_status FROM appointment 
            JOIN dentist ON appointment.den_id = dentist.den_id 
            JOIN admin ON appointment.admin_id = admin.admin_id 
            JOIN customer ON appointment.cust_id = customer.cust_id ORDER BY apm_id DESC 
            LIMIT $start, $limit";
                            $run_a = mysqli_query($con, $get_a);

                            $i = $start + 1;

                            while ($row_a = mysqli_fetch_array($run_a)) {
                                $apm_id = $row_a['apm_id'];
                                $apm_time = $row_a['apm_time'];
                                $apm_date = $row_a['apm_date'];
                                $remark = $row_a['remark'];
                                $apm_status = $row_a['apm_status'];
                                $den_id = $row_a['den_id'];
                                $den_name = $row_a['den_name'];
                                $cust_id = $row_a['cust_id'];
                                $cust_name = $row_a['name'];
                                $admin_id = $row_a['admin_id'];
                                $admin_name = $row_a['admin_name'];

                                echo "<tr>";
                                echo "<td>$apm_id</td>";
                                echo "<td>$apm_time</td>";
                                echo "<td>$apm_date</td>";
                                echo "<td>$remark</td>";
                                echo "<td>$den_name</td>";
                                echo "<td>$cust_name</td>";
                                echo "<td>$admin_name</td>";
                                echo "<td>$apm_status</td>";
                                echo "<td>";
                                echo "<a href='index.php?edit_appoinment=$apm_id'>";
                                echo "<i class='fa fa-pencil'> </i> Edit";
                                echo "</a>";
                                echo "</td>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";

                                $i++;
                            }
                            ?>
                        </tbody>
                        <!-- tbody Ends -->
                    </table>
                    <!-- table table-bordered table-hover table-striped Ends -->
                </div>
                <!-- table-responsive Ends -->
                        
            </div>
            <!-- panel-body Ends -->

            <div class="text-center">
    <?php
    $get_total = "SELECT COUNT(*) AS total FROM appointment";
    $total_result = mysqli_query($con, $get_total);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_appoinment = $total_row['total'];
    $total_pages = ceil($total_appoinment / $limit);

    if ($total_pages > 1) {
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        echo "<nav aria-label='Page navigation'>";
        echo "<ul class='pagination justify-content-center'>";
        
        // Previous page button
        if ($current_page != 1) {
            echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($current_page - 1) . "'>&laquo;</a></li>";
        }

        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<li class='page-item";
            if ($i == $current_page) {
                echo " active";
            }
            echo "'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
        }

        // Next page button
        if ($current_page != $total_pages) {
            echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($current_page + 1) . "'>&raquo;</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
    }
    ?>
</div>


        </div>
        <!-- panel panel-default Ends -->
    </div>
    <!-- col-lg-12 Ends -->
</div>
<!-- 2 row Ends -->

<script>
  function changeCStatus(id, status) {
    $.ajax({
        url: "update_appoinment.php",
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
