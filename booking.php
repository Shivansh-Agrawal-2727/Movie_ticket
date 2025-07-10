<?php 
include('connect.php');

if(!isset($_SESSION['uid'])){
  echo "<script> window.location.href='login.php';  </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking</title>
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
</head>

<body>
<?php
$theaterid = $_GET['id'];
?>

<section id="team" class="team section light-background">

<!-- Section Title -->
<div class="container section-title aos-init aos-animate" data-aos="fade-up">
  <h2>Ticket Booking for Theater</h2>
</div><!-- End Section Title -->

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <form action="booking.php" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-12">
                  <input type="hidden" name="theaterid" value="<?=$theaterid?>">
                </div>
                <br>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="person"  placeholder="Enter no of People" required="">
                </div>
                <br>
                <div class="col-md-12">
                  <input type="date" class="form-control" name="date"  required="">
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary" name="ticketbook">Ticket Book</button></div>             
                </div>
              </div>
            </form>
    </div><!-- End Team Member -->
  </div>
</div>
</section>
</body>

<?php

if(isset($_POST['ticketbook'])){

  $person = $_POST['person'];
  $date = $_POST['date'];
  $theaterid = $_POST['theaterid'];
  $uid = $_SESSION['uid'];

  $sql = "INSERT INTO `booking`(`theaterid`, `bookingdate`, `person`, `userid`) VALUES ('$theaterid','$date','$person','$uid')";
  if(mysqli_query($con, $sql)){
     echo "<script> alert('Ticket book successfully!!') </script>";
     echo "<script> window.location.href='index.php';  </script>";

  }else{
    echo "<script> alert('ticket not book')";
  }
}
?>
</html>

