<?php
require_once ("../function/add.php");
require_once('./includes/check_login.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Yo-Travels</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  <!-- <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
 
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="../icofont.css">
  <link href="../assets/vendor/boxicons/css/boxicons.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <link href="../style.css" rel='stylesheet' type='text/css' />
<!-- complete -->

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/jquery-ui.css" rel="stylesheet">


</head>


  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-transparent">
    <div class="container text-right">
      <i class="icofont-phone"></i> +94 76 575 6616
      <i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sun: 9:00 AM - 7:00 PM
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>Yo-Travels<span class="icofont-travelling" aria-hidden="true"></span></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <!-- <li class="active"><a href="index.php">Home</a></li> -->
          
          <li><a href="index.php">Home</a></li>
          <li><a href="travel_package.php">Travel Packages</a></li>
          <!-- <li><a href="#specials">Specials</a></li> -->
          <!-- <li><a href="#events">Events</a></li> -->
          <!-- <li><a href="#chefs">Chefs</a></li> -->
          <!-- <li><a href="#gallery">Gallery</a></li> -->
          <li><a href="contact.php">Contact</a></li>
          <li><a href="about.php">About Us</a></li>

          <li class="drop-down"><a href="userprofile.php">Hi, <?php echo $_SESSION['Name']; ?></a>
          
                <ul>
                  
                  <li><a href="userprofile.php">Profile</a></li>
                  <li><a href="logout.php" id = "button#" onclick="toggle()">Log Out</a></li>
                 
                </ul>
              </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  