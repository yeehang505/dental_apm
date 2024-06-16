<?php

include("includes/db.php");
   
    $c_id=$_POST['record'];
   
    $sql = "SELECT c_status from customer where cust_id='$c_id'"; 
    $result=$con-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["c_status"]==0){
         $update = mysqli_query($con,"UPDATE customer SET c_status=1 where cust_id='$c_id'");
         
    }
    else if($row["c_status"]==1){
         $update = mysqli_query($con,"UPDATE customer SET c_status=0 where cust_id='$c_id'");
         
     }
    
   
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>