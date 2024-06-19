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
                <i class="fa fa-dashboard"></i> Dashboard / View Dentist
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
                    <i class="fa fa-money fa-fw"></i> View Dentist
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
                                <th>Dentist Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Specification</th>
                                <!-- <th>Availability_Status</th> -->
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

                            $get_d = "SELECT * FROM dentist LIMIT $start, $limit";
                            $run_d = mysqli_query($con, $get_d);

                            $i = $start + 1;

                            while ($row_d = mysqli_fetch_array($run_d)) {
                                $den_id = $row_d['den_id'];
                                $den_name = $row_d['den_name'];
                                $den_contact = $row_d['den_contact'];
                                $den_email = $row_d['den_email'];
                                $specification = $row_d['specification'];
                                // $availability_id = $row_d['availability_id'];
                                echo "<script>console.log('$specification')</script>";

                                echo "<tr>";
                                echo "<td>$den_id</td>";
                                echo "<td>$den_name</td>";
                                echo "<td>$den_contact</td>";
                                echo "<td>$den_email</td>";
                                echo "<td>$specification</td>";
                                // echo "<td>";
                                // if ($availability_id == 0) {
                                //     echo "<button class='btn btn-danger' onclick='changedStatus($den_id, 1)'>Unavailable</button>";
                                // } else {
                                //     echo "<button class='btn btn-success' onclick='changedStatus($den_id, 0)'>Available</button>";
                                // }
                                // echo "</div>";
                                // echo "</td>";
                                echo "<td>";
                                echo "<a href='index.php?edit_dentist=$den_id'>";
                                echo "<i class='fa fa-pencil'> </i> Edit";
                                echo "</a>";
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
    $get_total = "SELECT COUNT(*) AS total FROM dentist";
    $total_result = mysqli_query($con, $get_total);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_dentist = $total_row['total'];
    $total_pages = ceil($total_dentist / $limit);

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
  function changedStatus(id, status) {
    $.ajax({
        url: "update_dentist.php",
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
