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

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>06-123 12345</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 9AM - 6PM</span></i>
      </div>

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
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">Luminous Smiles Dentistry</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Services</a></li>
          <li><a class="nav-link scrollto" href="#specials">Products</a></li>
          <li><a class="nav-link scrollto" href="#events">Package</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Dentist</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contactus">Contact</a></li>
          <li class="dropdown"><a href="javascript:void(0);"><span><?php echo $cust_name; ?></span> <i class="bi bi-chevron-down"></i></a>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Luminous Smiles Dentistry</span></h1>
          <h2>Creating Beautiful Smiles for more than 18 years!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Service</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Make appointment</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://youtu.be/lw7xIB0kPCo" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/ReceptionArea.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Providing exceptional care for a healthy, radiant smile.</h3>
            <p class="fst-italic">
              Creating beautiful, healthy smiles through advanced dental care and personalized treatment plans. Our team is dedicated to enhancing your oral health and ensuring your comfort with every visit.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Delivering top-notch dental services to enhance your comfort and overall oral health.</li>
              <li><i class="bi bi-check-circle"></i> Our expert team ensures your dental experience is comfortable and pain-free. We use the latest techniques to provide exceptional care, focusing on your overall well-being and satisfaction.</li>
              <li><i class="bi bi-check-circle"></i> We are committed to delivering gentle and effective dental treatments tailored to your needs. Experience top-tier oral care with our dedicated professionals, ensuring a healthy and radiant smile.</li>
            </ul>
            <p>
            Experience exceptional dental care tailored to your needs. Our skilled professionals prioritize your comfort and oral health, using advanced techniques to ensure pain-free treatments. Committed to excellence, we provide comprehensive care that leaves you smiling confidently
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Dentistry</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Personalized Care for Every Patient</h4>
              <p>We tailor our dental treatments to meet your unique needs, ensuring personalized care that promotes optimal oral health and a beautiful smile.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Advanced Technology and Techniques</h4>
              <p>Our clinic is equipped with the latest dental technology and employs cutting-edge techniques to provide you with the highest quality care in a comfortable setting.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Experienced and Compassionate Team</h4>
              <p>Our skilled and compassionate dental professionals are dedicated to making your visit pleasant and stress-free, delivering exceptional care with a gentle touch.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check Our Service</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-starters">Preventive Care</li>
              <li data-filter=".filter-salads">Restorative Dentistry</li>
              <li data-filter=".filter-specialty">Cosmetic Dentistry</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/checkup.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Dental Check-ups</a><span>RM150.00</span>
            </div>
            <div class="menu-ingredients">
            Regular examinations to monitor oral health and detect issues early.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/whitening.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Teeth Whitening</a><span>RM150.00</span>
            </div>
            <div class="menu-ingredients">
            Procedures to lighten and remove stains from teeth.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/fluoridetreatment.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Fluoride Treatments</a><span>RM150.00</span>
            </div>
            <div class="menu-ingredients">
            Application of fluoride to strengthen teeth and prevent cavities.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/filling.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Fillings</a><span>RM188.00</span>
            </div>
            <div class="menu-ingredients">
            Repairing cavities with materials such as composite resin or amalgam.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/dental-veneer.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Veneers</a><span>RM220.00</span>
            </div>
            <div class="menu-ingredients">
            Thin shells of porcelain or composite resin bonded to the front of teeth to improve appearance.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/tooth-brush.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Teeth Cleaning</a><span>RM180.00</span>
            </div>
            <div class="menu-ingredients">
            Professional cleaning to remove plaque, tartar, and stains.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/dental-implant.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Crowns</a><span>RM500.00</span>
            </div>
            <div class="menu-ingredients">
            Caps placed over damaged teeth to restore their shape, strength, and function.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/bridge.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Bridges</a><span>RM750.00</span>
            </div>
            <div class="menu-ingredients">
            Fixed prosthetics used to replace one or more missing teeth.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/bonding.png" class="menu-img" alt="">
            <div class="menu-content">
              <a href="javascript:void(0)">Bonding</a><span>RM250.00</span>
            </div>
            <div class="menu-ingredients">
            Application of tooth-colored resin to repair chips, cracks, or gaps.
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Products</h2>
          <p>Check Our Products</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">GentleBrite</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">CharcoalSilk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">OceanBreeze</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Silksoft Glide</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">GumGuard Probiotics</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>GentleBrite</h3>
                    <p class="fst-italic">For those with sensitive teeth, GentleBrite offers a soothing solution. This toothpaste gently whitens while protecting sensitive areas, ensuring a comfortable, radiant smile.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/Gentlebrite.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>CharcoalSilk</h3>
                    <p class="fst-italic">Infused with activated charcoal bristles to help whiten teeth and remove surface stains effectively, featuring ultra-soft bristles for sensitive gums, ensuring a gentle yet thorough clean.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/Charcoalsilk.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>OceanBreeze</h3>
                    <p class="fst-italic">Sea salt and mineral-rich mouthwash that promotes healthy gums and fresh breath with a hint of ocean freshness.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/OceanBreeze.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Silksoft Glide</h3>
                    <p class="fst-italic">Combining the gentle, extra soft design of SensitiveCare with the smooth glide of SilkGlide, ensuring minimal irritation and effective cleaning between teeth and along the gumline.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/dentalfloss.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>GumGuard Probiotics</h3>
                    <p class="fst-italic">Protects and strengthens gums by encouraging a balanced and healthy oral microbiome.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/dentalprobiotic.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Packages</h2>
          <p>Save money and More worth</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/design1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Basic Care Package</h3>
                  <div class="price">
                    <p><span>RM480</span></p>
                  </div>
                  <p class="fst-italic">
                  Ideal for maintaining good oral health, this package includes essential preventive care.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Dental Check-up</li>
                    <li><i class="bi bi-check-circled"></i> Fluoride Treatment</li>
                    <li><i class="bi bi-check-circled"></i> Teeth Cleaning</li>
                    <li><i class="bi bi-check-circled"></i> Fillings (up to 2)</li>
                  </ul>

                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/design2.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Cosmetic Care Package</h3>
                  <div class="price">
                    <p><span>RM600</span></p>
                  </div>
                  <p class="fst-italic">
                  Perfect for those looking to enhance their smile with cosmetic treatments.
                  </p>
                  <ul>
                  <li><i class="bi bi-check-circled"></i> Dental Check-up</li>
                    <li><i class="bi bi-check-circled"></i> Teeth Whitening</li>
                    <li><i class="bi bi-check-circled"></i> Veneers (up to 2)</li>
                    <li><i class="bi bi-check-circled"></i> Bonding (up to 2 teeth)</li>
                  </ul>
                
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/design3.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Comprehensive Care Package</h3>
                  <div class="price">
                    <p><span>RM1500</span></p>
                  </div>
                  <p class="fst-italic">
                  This all-inclusive package provides extensive dental care for both health and aesthetics.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Dental Check-up</li>
                    <li><i class="bi bi-check-circled"></i> Fluoride Treatment</li>
                    <li><i class="bi bi-check-circled"></i> Teeth Cleaning</li>
                    <li><i class="bi bi-check-circled"></i> Fillings (up to 4)</li>
                    <li><i class="bi bi-check-circled"></i> Crowns (up to 2)</li>
                    <li><i class="bi bi-check-circled"></i> Bridges (up to 2 units)</li>
                    <li><i class="bi bi-check-circled"></i> Teeth Whitening</li>
                  </ul>
                  
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Make appointment Section ======= -->
    <!-- <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Make appointment</p>
        </div>

        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Make appointment</button></div>
        </form>

      </div>
    </section> -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Make an Appointment</p>
        </div>
        <div class="wrapper">

          <div class="container-calendar">
            <h3 id="monthAndYear"></h3>

            <div class="button-container-calendar">
              <button id="previous" onclick="previous()">&#8249;</button>
              <button id="next" onclick="next()">&#8250;</button>
            </div>

            <table class="table-calendar bg-gradient" id="calendar" data-lang="en">
              <thead id="thead-month"></thead>
              <tbody id="calendar-body"></tbody>
            </table>

            <div class="footer-container-calendar">
              <label for="month">Jump To: </label>
              <select id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
              </select>
              <select id="year" onchange="jump()"></select>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal section -->
      <!-- Button trigger modal -->

      <!-- Modal -->
      <div class="modal fade" id="appointmentModal" role="dialog" aria-labelledby="appointmentModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title " id="appointmentModalTitle">Appointment <span id="apm_date"></span></h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" class="" id="apm_form">
                <div class="row">
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="time">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                    <div class="validate" id="validate-name"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <label for="time">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                    <div class="validate" id="validate-email"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-2">
                    <label for="time">Contact <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Your Contact">
                    <div class="validate" id="validate-contact"></div>
                  </div>
                  <div class="col-lg-12 col-md-12 form-group mt-3">
                    <div class="input-group date" id="timePicker">
                      <label for="">Time<span class="text-danger">*</span></label>
                      <div class="input-group date" id="timePicker">
                        <input type="text" class="form-control timePicker" id="apm_time" oninput="validateTime()">
                        <span class="input-group-addon">
                          <i class="fa-solid fa-clock p-2 black-icon  " aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                    <div class="validate" id="validate-time"></div>
                    <div class="timeRule" id="validate-time-rule"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 form-group mt-2">
                    <label for="time">Dr <span class="text-danger">* (Please choose your time first)</span></label>
                    <select class="form-select" style="pointer-events: none;" name="doctor" id="dentist_list">
                    </select>
                    <div class="validate" id="validate-doctor"></div>
                  </div>
                  <!-- <div class="col-lg-4 col-md-6 form-group mt-3">
                    <input type="number" class="form-control" name="people" id="people" placeholder="# of people">
                    <div class="validate"></div>
                  </div>
                </div> -->
                  <div class="form-group mt-3">
                    <textarea class="form-control" id="remark" rows="5" placeholder="Purpose of visit"></textarea>
                    <div class="validate" id="validate-remark"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- End Make appointment Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  My experience with the dental check-ups here has been excellent. The dentist was thorough and took the time to explain everything in detail. I felt well-informed about my oral health, and the whole process was comfortable and stress-free. I highly recommend these check-ups for anyone looking to stay on top of their dental health.                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I recently had a fluoride treatment and I can already feel the difference. My teeth feel stronger and more resilient. The process was quick and easy, and the dentist made sure I was comfortable throughout. It's a simple but highly effective treatment that I would recommend to anyone looking to protect their teeth.                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I needed crowns on a couple of my teeth and was nervous about the procedure. The dentist was incredibly reassuring and professional. The crowns look and feel just like my natural teeth. The entire process was smooth, and I couldn't be happier with the results. I highly recommend their crown services!                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Getting veneers was the best decision I made for my smile. The dentist was meticulous, ensuring that the veneers matched perfectly with my natural teeth. The results are fantastic – my teeth look natural and beautiful. I can't stop smiling, and I've received so many compliments. Thank you for giving me the smile I've always wanted!                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I had my teeth whitened here and the results are amazing. The procedure was comfortable and the dentist explained each step. My teeth are several shades whiter and the difference is noticeable. It's given me so much more confidence in my smile. If you're thinking about teeth whitening, do it here – you won't be disappointed!                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Dentistry</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/consultroom.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/consultroom.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/waitingarea.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/waitingarea.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/waitingarea1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/waitingarea1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/operationroom.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/operationroom.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/Sterilization Room.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/Sterilization Room.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/consultroom1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/consultroom1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/Comfortable Lounge.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/Comfortable Lounge.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/Calming Garden.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/Calming Garden.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dentist</h2>
          <p>Our Professional Dentist</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="assets/img/chefs/Dr-Janice-Tan.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Dr. Janice Tan Shuqin</h4>
                  <span>Dental Surgeon</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/chefs/Dr-Andy-Ooi.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Dr. Andy Ooi Yet Lee</h4>
                  <span>Dental Surgeon</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="assets/img/chefs/Dr-Beh-Wee-Ren.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Dr. Beh Wee Ren</h4>
                  <span>Dental Director & Surgeon</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contactus" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>No.88, Jalan Bukit Bintang, Puchong, 47100, Selangor</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  9:00 AM - 6:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>LuminousSD@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>06-123 12345</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="" method="post" class="php-email-form" id="apm_contactform">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="contact_name" placeholder="Your Name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="contact_email" placeholder="Your Email">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="contact_subject" placeholder="Subject">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" id="contact_message"></textarea>
              </div>
              <div class="text-center"><button type="button" id="contact_submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
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

  <script src="assets\js\calendar.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets\js\timepicker.js"></script>

  <script src="assets\js\appointment_form.js"></script>
  <script src="assets\js\dentist_list.js"></script>
  <script src="assets\js\contactus.js"></script>
  <script src="assets\js\logout.js"></script>


</body>

</html>