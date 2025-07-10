<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<section id="team" class="team section background" style="background-color: #f2f2f2;">

<!-- Section Title -->
<div class="container section-title aos-init aos-animate" data-aos="fade-up">
  <h2 style="background-color: #343a40; color:white;">Register for booking ticket</h2>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <form action="register.php" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-12">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required="">
                </div>
                <br>
                <div class="col-md-12">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
                <br>
                <div class="col-md-12">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required="">
                </div>

                <div class="text-center"><button type="submit" class="btn btn-primary" name="register" style="background-color: #343a40; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; color: white;">Register</button></div>
                
                </div>

              </div>
            </form>
    </div><!-- End Team Member -->

  </div>

</div>
</section>
</body>

<?php

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // print_r($_POST);
    
    $sql = "INSERT INTO users(`name`, `email`, `password`, `roletype`) VALUES ('$name', '$email', '$password', '2')";

    if(mysqli_query($con,$sql))
    {
        echo "<script> alert('user register successfully') </script>";
        echo "<script> window.location.href='login.php'; </script>";
    }
    else
    {
        echo "<script> alert('this email may exist') </script>";
    }
}

?>
</html>