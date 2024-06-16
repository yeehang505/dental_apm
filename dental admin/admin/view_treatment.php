<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Treatment

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> View Treatment

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#</th>
<th>Treatment Name</th>
<th>Treatment Cost</th>
<th>Treatment Time</th>
<th>Edit</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i=0;

include("includes/db.php");

$get_treatment = "select * from treatment";

$run_treatment = mysqli_query($con,$get_treatment);

while($row_treatment = mysqli_fetch_array($run_treatment)){

$treat_id = $row_treatment['treat_id'];

$treat_name = $row_treatment['treat_name'];

$treat_cost = $row_treatment['treat_cost'];

$treat_time = $row_treatment['treat_time'];


$i++;

?>

<tr>

<td> <?php echo $i; ?> </td>

<td> <?php echo $treat_name ; ?> </td>

<td> <?php echo $treat_cost ; ?> </td>

<td> <?php echo $treat_time ; ?> </td>


<td> 

<a href="index.php?edit_treatment=<?php echo $treat_id; ?>">

<i class="fa fa-pencil"></i> Edit

</a>

</td>

</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Treatment
  </button>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Treatment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="add_treatment.php" method="POST">
            <div class="form-group">
              <label for="size">Treatment Name:</label>
              <input type="text" class="form-control" name="treat_name" required>
            </div>
            <div class="form-group">
                <label for="size">Treatment time:</label>
                <input type="time" class="form-control" name="treat_time" min="09:00" max="17:00" required>
            </div>
            <div class="form-group">
                <label for="size">Cost:</label>
                <input type="number" class="form-control" name="treat_cost" min="0" step="0.1" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="add_treatment" style="height:40px">Add Treatment</button>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>


</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<script>
  function changeStatus(id, status) {
    $.ajax({
        url: "update_p_cat.php",
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
