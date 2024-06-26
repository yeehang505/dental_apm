<html>  
<head>  
    <title>Login</title>  
      
    <link rel = "stylesheet" type = "text/css" href = "assets/css/login_register.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script>  
        function validation()  
        {  
            var id=document.f1.user.value;  
            var ps=document.f1.pass.value;  
            if(id.length=="" && ps.length=="") {  
                alert("Username and Password fields are empty");  
                return false;  
            }  
            else  
            {  
                if(id.length=="") {  
                    alert("Username is empty");  
                    return false;  
                }   
                if (ps.length=="") {  
                alert("Password field is empty");  
                return false;  
                }  
            }                             
        }  
    </script> 
</head>  
<body>  
    <div class="logo">
        <!-- <div><img src="assets/img/logo.png"></div> -->
        <div class="logo-label"><label>LUMINOUS SMILES DENTISTRY</label></div>
    </div>
    
    <div class="wrapper">
        
        <form name="f1" action = "assets/php/login.php" onsubmit = "return validation()" method = "POST">
            <div class="title"><h1>Login</h1></div>
            
            <div class="input-box">
                <input name = "user" type="text" placeholder="Username" required>
                <div class="input-image"><i class='bx bxs-user'></i></div>
            </div>
            <div class="input-box" >
                <input name ="pass" type="password" placeholder="Password" required>
                <div class="input-image"><i class='bx bxs-lock-alt' ></i></div>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="passwordreset.php">Forgot password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="register.php" target="_blank">Register now</a></p>
            </div>
        </form>
    </div>
</body>     
</html>  