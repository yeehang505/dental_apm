<?php

include("includes/db.php");
   
$admin_id=$_POST['record'];
   
    $sql = "SELECT admin_status FROM adminss where admin_id='$admin_id'"; 
    $result=$con-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["admin_status"]==0){
         $update = mysqli_query($con,"UPDATE admins SET admin_status=1 where admin_id='$admin_id'");
         
    }
    else if($row["admin_status"]==1){
         $update = mysqli_query($con,"UPDATE admins SET admin_status=0 where admin_id='$admin_id'");
         
     }
    
   
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>