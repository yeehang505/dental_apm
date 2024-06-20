<!DOCTYPE html>
<html lang="en">
<?php
include 'assets/php/connection.php';

session_start();
if (!isset($_SESSION['id'])) {
  echo"<script>alert('Please Login')</script>";
  echo "<script>window.open('login.php','_self')</script>";
}
else{
  $session_id = $_SESSION['id'];
  $sql = "SELECT * FROM customer WHERE cust_id='$session_id'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $cust_name = $row['name'];
  $cust_email = $row['email'];
  $cust_contact_no = $row['contact_no'];
  $cust_ic = $row['ic'];
}
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LUMINOUS SMILES DENTISTRY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/calender.css" rel="stylesheet">
  <link href="assets/css/glyphicon.css" rel="stylesheet">


  <!-- Toastr -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <!-- Datetime picker -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap4-datetimepicker@5.2.3/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <?php
          if (!isset($_SESSION['id'])) {
            echo '  
          <li><a href="login.php">Sign In</li>
          <li><a href="register.php">Register</a></li>';
          }
          ?>
        
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">LUMINOUS SMILES DENTISTRY</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li><a class="nav-link scrollto active" href="javascript:void(0)" onclick="scrollToSection('hero')">Home</a></li>
        <li><a class="nav-link scrollto" href="javascript:void(0)" onclick="scrollToSection('about')">About</a></li>
        <li><a class="nav-link scrollto" href="javascript:void(0)" onclick="scrollToSection('menu')">Services</a></li>
        <li><a class="nav-link scrollto" href="javascript:void(0)" onclick="scrollToSection('specials')">Products</a></li>
        <li><a class="nav-link scrollto" href="javascript:void(0)" onclick="scrollToSection('events')">Package</a></li>
        <li><a class="nav-link scrollto" href="javascript:void(0)" onclick="scrollToSection('chefs')">Dentist</a></li>
        <li><a class="nav-link scrollto" href="javascript:void(0)" onclick="scrollToSection('gallery')">Gallery</a></li>
        <li><a class="nav-link scrollto" href="javascript:void(0)" onclick="scrollToSection('contactus')">Contact</a></li>          <li class="dropdown"><a href="javascript:void(0);"><span><?php echo $cust_name; ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="javascript:void(0);"><span>My Account</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="update_password.php">Reset password</a></li>
                </ul>
              </li>
              <li><a href="my_appointment.php">My appointment</a></li>
              <li><a href="javascript:void(0);" id="logout">Log out</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Make appointment</a>

    </div>
  </header><!-- End Header -->

  <main id="main">
      <section id="contact" class="contact" >
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Update Password</h2>
          </div>
          <div class="row mt-5">
            <div class="col-lg-12 mt-5 mt-lg-0">
              <form id="update_password" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password" required>
                    <div id="validate_current_password" class="text-danger"></div>
                  </div>
                  <div class="col-md-12 form-group mt-3 mt-md-0">
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                    <div id="validate_new_password" class="text-danger"></div>
                  </div>
                  <div class="col-md-12 form-group">
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                    <div id="validate_confirm_password" class="text-danger"></div>
                  </div>
                </div>
                <div class="text-center"><button type="submit">Update Password</button></div>
              </form>
            </div>
          </div>
        </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
            <h3>LUMINOUS SMILES DENTISTRY</h3>
              <p>
                No.88, Jalan Bukit Bintang, <br>
                Puchong, 47100, Selangor<br><br>
                <strong>Phone:</strong> 06-123 12345<br>
                <strong>Email:</strong> LuminousSD@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Preventive Care</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Restorative Dentistry</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cosmetic Dentistry</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>However, who can deny that many have benefited from our great dental care.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Luminous Smiles Dentistry</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script> -->
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="assets\js\update_password.js"></script>
  <script src="assets\js\logout.js"></script>


</body>

</html>