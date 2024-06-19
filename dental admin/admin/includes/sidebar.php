 <?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_appoinment" >

<i class="fa fa-fw fa-envelope" ></i> Appointment

<span class="badge" ><?php echo $count_appoinment; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_customers" >

<i class="fa fa-fw fa-gear" ></i> Customers

<span class="badge" ><?php echo $count_customer; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_dentist" >

<i class="fa fa-fw fa-gear" ></i> Dentist

<span class="badge" ><?php echo $count_dentist; ?></span>


</a>

</li><!-- li Ends -->

<li class="divider"></li>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->

<li><!-- Appointment li Starts -->

<a href="#" data-toggle="collapse" data-target="#appointment">

<i class="fa fa-fw fa-table"></i> Appointment

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="appointment" class="collapse">

<li>
<a href="index.php?view_appoinment"> View Appointment </a>
</li>

<li>
<a href="index.php?insert_appoinment"> Insert Appointment </a>
</li>


</ul>

</li><!-- Appointment li Ends -->


<li>

<a href="index.php?view_treatment">

<i class="fa fa-fw fa-pencil"></i> Treatment

</a>

</li>


<li><!-- Dentist li Starts -->

<a href="#" data-toggle="collapse" data-target="#dentist">

<i class="fa fa-fw fa-edit"></i> Dentist

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="dentist" class="collapse">

<li>
<a href="index.php?view_dentist"> View Dentist </a>
</li>

<li>
<a href="index.php?insert_dentist"> Insert Dentist </a>
</li>

</ul>

</li><!-- Dentist li Ends -->


<li>

<a href="index.php?view_customers">

<i class="fa fa-fw fa-edit"></i> View Customers

</a>

</li>

<?php 
$admin_email = $_SESSION['admin_email'];

$get_admin = "SELECT admin_role FROM admin WHERE admin_email='$admin_email'";
$run_admin = mysqli_query($con,$get_admin);
$row_admin = mysqli_fetch_array($run_admin);
$admin_role = $row_admin['admin_role'];

if($admin_role == 'superadmin'){
?>
<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#users">

<i class="fa fa-fw fa-gear"></i> Admin

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="users" class="collapse">

<li>
<a href="index.php?insert_user"> Insert Admin </a>
</li>

<li>
<a href="index.php?view_users"> View Admin </a>
</li>

<li>
<a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit Admin Profile </a>
</li>

</ul>

</li><!-- li Ends -->
<?php 
}
?>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>