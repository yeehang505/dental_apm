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
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
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
                    <i class="fa fa-money fa-fw"></i> View Customers
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Ic</th>
                                <th>Password</th>
                                <!-- <th>Status</th> -->
                            </tr>
                        </thead>
                        <!-- thead Ends -->

                        <tbody>
                            <!-- tbody Starts -->
                            <?php
                            $limit = 10; // Number of customers per page
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;

                            $get_c = "SELECT * FROM customer LIMIT $start, $limit";
                            $run_c = mysqli_query($con, $get_c);

                            $i = $start + 1;

                            while ($row_c = mysqli_fetch_array($run_c)) {
                                $c_id = $row_c['cust_id'];
                                $c_name = $row_c['name'];
                                $c_email = $row_c['email'];
                                $c_contact = $row_c['contact_no'];
                                $c_ic = $row_c['ic'];
                                $c_pass = $row_c['cust_pass'];
                                // $c_status = $row_c['c_status'];
                                

                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>$c_name</td>";
                                echo "<td>$c_email</td>";
                                echo "<td>$c_contact</td>";
                                echo "<td>$c_ic</td>";
                                echo "<td>$c_pass</td>";
                                // echo "<td>";
                                // echo "<div id='cStatus$c_status'>";
                                // if ($c_status == 0) {
                                //     echo "<button class='btn btn-danger' onclick='changeCStatus($c_id, 1)'>Inactive</button>";
                                // } else {
                                //     echo "<button class='btn btn-success' onclick='changeCStatus($c_id, 0)'>Active</button>";
                                // }
                                // echo "</div>";
                                // echo "</td>";
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
    $get_total = "SELECT COUNT(*) AS total FROM customer";
    $total_result = mysqli_query($con, $get_total);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_customers = $total_row['total'];
    $total_pages = ceil($total_customers / $limit);

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
        url: "update_cus.php",
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
