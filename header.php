<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
  <style>
  .branding {
    background-color: #333;
    color: #fff;
    padding: 10px 0px; 
    border-bottom: 2px solid #444;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .branding .logo h1 {
      margin: 0;
      font-size: 28px;
      font-family: 'Montserrat', sans-serif;
      color: #f8d210;
      text-transform: uppercase;
      font-weight: bold;
  }

  .navmenu ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      gap: 10px;
      justify-content: flex-end;
  }

  .navmenu ul li a {
      text-decoration: none;
      color: #fff;
      font-size: 16px;
      font-family: 'Roboto', sans-serif;
      font-weight: 500;
      padding: 5px 8px;
  }

  .navmenu ul li a:hover {
      background-color: #f8d210;
      color: #333;
      border-radius: 4px;
  }
</style>
</head>
<body>
<div class="branding d-flex align-items-cente" style="border-bottom: 1px solid black;">

<div class="container position-relative d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1 class="sitename" style="font-size: 32px"><b>Movies</b></h1>
  </a>

  <nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="index.php" class="">Home</a></li>
      <?php

        if(!isset($_SESSION['uid']))
        {
          echo '
            <li><a href="allmovies.php" class="">Movies</a></li>
            <li><a href="alltheater.php" class="">Theater</a></li>
            <li><a href="login.php" class="">Login</a></li>
            <li><a href="register.php" class="">Register</a></li>';
        }
        else
        {
          $type = $_SESSION['type'];
          if($type==2)
          {
            echo '
              <li><a href="allmovies.php" class="">Movies</a></li>
              <li><a href="alltheater.php" class="">Theater</a></li>
              <li><a href="viewprofile.php" class="">Profile</a></li>
              <li><a href="viewuserbooking.php" class="">Booking</a></li>
              <li><a href="logout.php" class="">Logout</a></li>';
          }
        }
      ?>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>

</div>

</div>
</body>
</html>