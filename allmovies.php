<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        h3 {
            color: #343a40; 
            font-size: 28px;
            margin-bottom: 15px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title span {
            color: #6c757d; 
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .member {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            width: 220px;
        }

        .member:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .member-img {
            position: relative;
            width: 100%;
        }

        .member-img img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .member-info {
            padding: 15px;
            text-align: center;
            background-color: #f8f9fa;
        }

        .member-info p {
            font-size: 18px;
            font-weight: bold;
            color: #343a40;
            margin: 5px 0;
        }

        .social {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .social .btn {
            background-color: #343a40; 
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .social .btn:hover {
            background-color: #23272b;
        }
        </style>
</head>
<body>
<?php include('header.php')  ?>

<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
          <h3>Bollywood <span>Movies</span></h3>
        </div>

        <div class="row mt-5">
          <?php

            $sql = "SELECT movies.*, category.catname
            from movies
            inner join category on category.catid = movies.catid
            where movies.catid = 1
            order by movies.movieid";
            $res  = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) > 0){
                while($data = mysqli_fetch_array($res)){

            ?>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="margin-top:-60px">
                <div class="member">
                <div class="member-img">
                    <img src="admin/uploads/<?= $data['image'] ?>" style="height:250px !important; width:220px !important;" alt="">
                    <div class="social">
                    <center>
                    <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                    </div>
                </div>
                <div class="member-info">
                    <center>
                    <p style="color: black; font-size: 18px;"><b><?= $data['title'] ?></b></p>
                    </center>
                </div>
                </center>
                </div>
            </div><!-- End Team Member -->

          <?php
            }
          }
          ?>

        </div>
        <div class="section-title mt-4">
          <h3>Hollywood <span>Movies</span></h3>
        </div>

        <div class="row mt-5">
          <?php

            $sql = "SELECT movies.*, category.catname from movies
            inner join category on category.catid = movies.catid
            where movies.catid = 2
            order by movies.movieid DESC";
            $res  = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) > 0){
                while($data = mysqli_fetch_array($res))
                {
            ?>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="margin-top:-60px">
            <div class="member">
              <div class="member-img">
                <img src="admin/uploads/<?= $data['image'] ?>" style="height:250px !important; width:220px !important;" alt="">
                <div class="social">
                    <center>
                <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                </div>
              </div>
              <div class="member-info">
                <center>
                <p style="color: black; font-size: 18px;"><b><?= $data['title'] ?></b></p>
                </center>
              </div>
              </center>
             </div>
            </div><!-- End Team Member -->

          <?php
            }
          }
          ?>
        </div>
      </div>
</section>
<?php include('footer.php')  ?>
</body>
</html>