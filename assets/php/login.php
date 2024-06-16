<?php   
    session_start();  
    include('connection.php');  
    $name = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $name = stripcslashes($name);  
        $password = stripcslashes($password);  
        $name = mysqli_real_escape_string($con, $name);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from customer where name = '$name' and cust_pass = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            
            $_SESSION['id'] = $row['cust_id'];
            echo "<script>
                    alert('Login successful');
                    window.location.href = 'http://localhost/dental_apm/index.php';
                </script>";  
        }  
        else{  
            echo "<script>
                    alert('Login failed. Invalid name or password');
                    window.location.href = 'http://localhost/dental_apm/login.php';
                </script>"; 
        }     
?>  