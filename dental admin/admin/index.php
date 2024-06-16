<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

$admin_session = $_SESSION['admin_email'];

$get_admin = "select * FROM admin where admin_email='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];

$admin_contact = $row_admin['admin_contact'];



$get_appoinment = "SELECT * FROM appoinment";
$run_appoinment = mysqli_query($con,$get_appoinment);
$count_appoinment = mysqli_num_rows($run_appoinment);

$get_treatment = "SELECT * FROM treatment";
$run_treatment = mysqli_query($con,$get_treatment);
$count_treatment = mysqli_num_rows($run_treatment);

$get_dentist = "SELECT * FROM dentist";
$run_dentist = mysqli_query($con,$get_dentist);
$count_dentist = mysqli_num_rows($run_dentist);


$get_customer = "SELECT * FROM customer";
$run_customer = mysqli_query($con,$get_customer);
$count_customer = mysqli_num_rows($run_customer);


// Query to get the total number of appointments
$get_total_appoinments = "SELECT * FROM appoinment";
$run_total_appoinments = mysqli_query($con, $get_total_appoinments);
$count_total_appoinments = mysqli_num_rows($run_total_appoinments);

// Query to get the number of pending appointments
$get_pending_appoinments = "SELECT COUNT(*) AS count FROM appoinment WHERE apm_status='Pending'";
$run_pending_appoinments = mysqli_query($con, $get_pending_appoinments);
$row_pending_appoinments = mysqli_fetch_assoc($run_pending_appoinments);
$count_pending_appoinments = $row_pending_appoinments['count'];

// Query to get the number of completed (confirmed) appointments
$get_completed_appoinments = "SELECT COUNT(*) AS count FROM appoinment WHERE apm_status='Confirmed'";
$run_completed_appoinments = mysqli_query($con, $get_completed_appoinments);
$row_completed_appoinments = mysqli_fetch_assoc($run_completed_appoinments);
$count_completed_appoinments = $row_completed_appoinments['count'];






?>


<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >


</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['view_appoinment'])){

include("view_appointment.php");
    
}

if(isset($_GET['insert_appoinment'])){

include("insert_appoinment.php");
        
}

if(isset($_GET['edit_appoinment'])){

include("edit_appoinment.php");
        
}

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['insert_product'])){

include("insert_product.php");

}

if(isset($_GET['view_products'])){

include("view_products.php");

}

if(isset($_GET['delete_product'])){

include("delete_product.php");

}

if(isset($_GET['edit_product'])){

include("edit_product.php");

}

if(isset($_GET['view_sizes'])){

include("view_sizes.php");
    
}

if(isset($_GET['add_sizes'])){

include("add_sizes.php");
            
}

if(isset($_GET['delete_sizes'])){

include("delete_sizes.php");
                
}

if(isset($_GET['view_p_sizes'])){

include("view_p_sizes.php");
        
}

if(isset($_GET['add_p_sizes'])){

include("add_p_sizes.php");
            
}

if(isset($_GET['delete_p_sizes'])){

include("delete_p_sizes.php");
            
}

if(isset($_GET['edit_p_sizes'])){

include("edit_p_sizes.php");
            
} 


if(isset($_GET['insert_p_cat'])){

include("insert_p_cat.php");

}

if(isset($_GET['view_p_cats'])){

include("view_p_cats.php");

}

if(isset($_GET['delete_p_cat'])){

include("delete_p_cat.php");

}

if(isset($_GET['edit_p_cat'])){

include("edit_p_cat.php");

}

if(isset($_GET['insert_cat'])){

include("insert_cat.php");

}

if(isset($_GET['view_cats'])){

include("view_cats.php");

}

if(isset($_GET['delete_cat'])){

include("delete_cat.php");

}

if(isset($_GET['edit_cat'])){

include("edit_cat.php");

}

if(isset($_GET['insert_slide'])){

include("insert_slide.php");

}


if(isset($_GET['view_slides'])){

include("view_slides.php");

}

if(isset($_GET['delete_slide'])){

include("delete_slide.php");

}


if(isset($_GET['edit_slide'])){

include("edit_slide.php");

}


if(isset($_GET['view_customers'])){

include("view_customers.php");

}

if(isset($_GET['customer_delete'])){

include("customer_delete.php");

}


if(isset($_GET['view_orders'])){

include("view_orders.php");

}

if(isset($_GET['order_delete'])){

include("order_delete.php");

}

//if(isset($_GET['view_c_order'])){

//include("view_c_order.php");
    
//}

if(isset($_GET['insert_treatment'])){

    include("insert_treatment.php");
    
    }
    
    if(isset($_GET['view_treatment'])){
    
    include("view_treatment.php");
    
    }

    if(isset($_GET['edit_treatment'])){
    
    include("edit_treatment.php");
    
    }

  
    

if(isset($_GET['insert_dentist'])){

    include("insert_dentist.php");
    
    }
    
    if(isset($_GET['view_dentist'])){
    
    include("view_dentist.php");
    
    }
    
    if(isset($_GET['edit_dentist'])){
    
    include("edit_dentist.php");
        
    }
    
    if(isset($_GET['user_delete'])){
    
    include("user_delete.php");
    
    }

if(isset($_GET['insert_user'])){

include("insert_user.php");

}

if(isset($_GET['view_users'])){

include("view_users.php");

}

if(isset($_GET['edit_user'])){

include("edit_user.php");
    
}

if(isset($_GET['user_delete'])){

include("user_delete.php");

}



if(isset($_GET['user_profile'])){

include("user_profile.php");

}



if(isset($_GET['edit_css'])){

include("edit_css.php");

}






?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    
</body>


</html>

<?php } ?>