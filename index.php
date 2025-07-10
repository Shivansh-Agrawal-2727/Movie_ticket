<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        color: #343a40; 
        font-size: 28px;
        margin-bottom: 10px;
    }

    p.description-title {
        text-align: center;
        font-size: 16px;
        color: #6c757d; 
    }

    form {
        margin: 20px auto;
        text-align: center;
    }

    .form-group input,
    .form-group select {
        width: 250px;
        padding: 10px;
        font-size: 14px;
        margin: 5px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        outline: none;
        background-color: #ffffff;
        color: #495057; 
    }

    .btn-primary {
        background-color: #343a40;
        color: #ffffff; 
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #23272b; 
    }

    .member {
        text-align: center;
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        margin: 10px;
        transition: transform 0.3s ease;
    }

    .member:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .member-img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .member-info {
        padding: 15px;
        background-color: #f8f9fa;
    }

    .member-info p {
        font-size: 18px;
        font-weight: bold;
        color: #343a40; 
        margin: 5px 0;
    }

    .member-info span {
        display: block;
        font-size: 14px;
        color: #6c757d; 
    }

    .social .btn {
        margin-top: 10px;
        background: #343a40;
        color: #ffffff;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .social .btn:hover {
        background: #23272b;
    }
    </style>
</head>
<body>


    <section id="team" class="team section background">

      <!-- Section Title -->
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Latest Movies</h2>
        <p><span>New collection</span> <span class="description-title">2023</span></p>
      </div><!-- End Section Title -->

      <form action="index.php" method="post">
          <div class="row" style="padding-bottom:30px; padding-left:80px;">
        
            <div class="col-lg-3 col-md-6 d-flex" >
                <div class="form-group">
                  <input type="text" class="form-control" name="movie_search" placeholder="Search Movie Name">
                </div>    
            </div>
           
            <div class="col-lg-3 col-md-6 d-flex" >
                <div class="form-group">
                  <select name="catid" class="form-control" >
                      <option value="">Select Category</option>
                      <?php
                        $sql = "SELECT * FROM `category`";
                        $res  = mysqli_query($con, $sql);
                        if(mysqli_num_rows($res) > 0){
                          while($data = mysqli_fetch_array($res)){

                            ?> <option value="<?=$data['catid']?>"> <?=$data['catname']?> </option> 
                        <?php   
                          }
                        }else{
                        ?>
                           <option value="">No Category found</option>  
                        <?php
                        }  
                      ?> 
                  </select>
                </div>
            </div>
            <div class="col-lg-1 col-md-6 d-flex" >
                      <div class="form-group">
                        <input type="submit" name="btnSearch" value="Search" class="btn btn-primary">
                      </div>
            </div>

          </div>
      </form>

      <div class="container">

        <div class="row gy-4">
        <?php

          if(isset($_POST['btnSearch']))
          {
            $movie_search = $_POST['movie_search'];
            $catid = $_POST['catid'];

            $sql = "SELECT movies.*, category.catname from movies
            inner join category on category.catid = movies.catid
            where movies.title LIKE '%$movie_search%' and movies.catid = '$catid'";
            $res  = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) > 0){
              while($data = mysqli_fetch_array($res))
              {
          ?>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="admin/uploads/<?= $data['image'] ?>" style="height:250px !important; width:220px !important;" alt="">
                <div class="social">
                <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                </div>
              </div>
              <div class="member-info">
                <p style="color: black; font-size: 18px;"><b><?= $data['title'] ?></b></p>
                <span><?= $data['catname'] ?></span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <?php
            }
          }
        }else{

          $sql = "SELECT movies.*, category.catname from movies inner join category on category.catid = movies.catid order by movies.movieid DESC";
          $res  = mysqli_query($con, $sql);
          if(mysqli_num_rows($res) > 0)
          {
            while($data = mysqli_fetch_array($res))
            {
              ?>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="admin/uploads/<?= $data['image'] ?>" style="height:250px !important; width:220px !important;" alt="">
                <div class="social">
                <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                </div>
              </div>
              <div class="member-info">
                <p style="color: black; font-size: 18px;"><b><?= $data['title'] ?></b></p>
                <span><?= $data['catname'] ?></span>
              </div>
            </div>
          </div><!-- End Team Member -->
          <?php
            }
          }
        }?>
        </div>

      </div>

    </section>
    <?php include('footer.php'); ?>
</body>
</html>