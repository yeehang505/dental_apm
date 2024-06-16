<!DOCTYPE html>
<html>  
<head>  
    <title>Registration</title>  
      
    <link rel = "stylesheet" type = "text/css" href = "assets/css/login_register.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script>  
        function validation()  {
            var ps=document.forms["f2"]["pass"].value;
            var em=document.forms["f2"]["email"].value;
            var nm=document.forms["f2"]["name"].value;
            var contact=document.forms["f2"]["contact"].value;
            var ic=document.forms["f2"]["ic"].value;
            console.log(contact, ps, em, nm, ic);
            
            // check if all fields are empty
            if(ps === '' && em === '' && nm === '' && contact === '' && ic === '') {
                alert("All fields are empty");
                return false;
            } 
            else  {
                // check if password field is empty
                if (ps.length === 0) { 
                    alert("Password field is empty"); 
                    return false; 
                }
                // check if email field is empty
                if (em.length === 0) { 
                    alert("Email field is empty"); 
                    return false; 
                }
                // check if name field is empty
                if (nm.length === 0) { 
                    alert("Name field is empty"); 
                    return false; 
                }

                // check if contact is not a valid number
                if(contact.length != 10 && contact.length != 11){
                    alert("Not a valid contact number");
                    return false;
                }
                // check if ic is not a valid number
                if(ic.length != 12){
                    alert("Not a valid IC number");
                    return false;
                }
                // check if email is not a valid email
                var aliaspos = em.indexOf("@");
                var dotpos = em.lastIndexOf(".");
                if (aliaspos < 1 || dotpos < aliaspos + 2 || dotpos + 3 > em.length) {
                    alert("Not a valid e-mail");
                    return false;
                }
            }
            return true;

        }
    </script> 
</head>  
<body>  
    <div class="logo">
        <div><img src="assets/img/logo.png"></div>
        <div class="logo-label"><label>T-care</label></div>
    </div>
    
    <div class="wrapper">
        
        <form name="f2" action = " assets/php/registration.php" onsubmit = "return validation()" method = "POST">
            <div class="title"><h2>Registration</h2></div>
            
            <div class="input-box">
                <input name = "name" type="text" placeholder="Username" required>
                <div class="input-image"><i class='bx bxs-user'></i></div>
            </div>

            <div class="input-box">
                <input name = "email" type="text" placeholder="Email" required>
                <div class="input-image"><i class='bx bxs-envelope'></i></div>
            </div>

            <div class="input-box">
                <input name = "contact" type="text" placeholder="Contact Number" pattern="[0-9]{10,11}" required>
                <div class="input-image"><i class='bx bxs-envelope'></i></div>
            </div>
            <div class="input-box">
                <input name = "ic" type="text" placeholder="IC" pattern="[0-9]{12}" required>
                <div class="input-image"><i class='bx bxs-envelope'></i></div>
            </div>

            <div class="input-box" >
                <input name ="pass" type="password" placeholder="Password" required>
                <div class="input-image"><i class='bx bxs-lock-alt' ></i></div>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" required>Accept Terms of Service and Privacy Policy.</label>
            </div>

            <button type="submit" class="btn">Register</button>

            <div class="register-link">
                <p>Already have an account?<a href="login.php" target="_blank">Login</a></p>
            </div>
        </form>
    </div>
</body>     
</html>  