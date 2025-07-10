<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theater</title>
    <style>
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
            color: #343a40; /* Dark text color for headings */
            font-size: 28px;
            margin-bottom: 15px;
            text-align: center;
        }

        .section-title {
            margin-bottom: 40px;
        }

        .section-title h3 {
            font-size: 32px;
            color: #343a40;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .team-member {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 250px;
            transition: transform 0.3s ease;
            margin-bottom: 30px;
        }

        .team-member:hover {
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
            border-radius: 10px 10px 0 0;
        }

        .member-info {
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 0 0 10px 10px;
            text-align: center;
        }

        .member-info h4 {
            font-size: 22px;
            color: #343a40;
            margin-bottom: 10px;
        }

        .member-info h6 {
            color: #6c757d; /* Light gray color */
            font-size: 18px;
            margin: 5px 0;
        }

        .member-info span {
            display: block;
            font-size: 16px;
            color: #6c757d;
            margin: 3px 0;
        }

        .member-info a {
            background-color: #343a40; /* Match the navbar color */
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .member-info a:hover {
            background-color: #23272b; /* Darker shade on hover */
        }
        </style>
</head>
<body>
<?php include('header.php')  ?>
<section id="team" class="team section background">
            <!-- Section Title -->
            <div class="container section-title aos-init aos-animate" data-aos="fade-up">
                <h3>Our Theater</h3>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
<?php
    $sql = "select theater.*, movies.*, category.catname
    from theater
    inner join movies on movies.movieid = theater.movieid
    inner join category on category.catid = movies.catid
    order by theater.theaterid DESC";
    $res  = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res))
        {
    ?>  
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                    <div class="member-img">
                    <img src="admin/uploads/<?= $data['image'] ?>"  style="height:250px !important; width:250px !important;" alt="">
                        <div class="social">
                            <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>     
                        </div>
                    </div>
                    <div class="member-info">
                        <h4><?= $data['theater_name'] ?></h4>
                        <h6><?= $data['title'] ?> <span><?= $data['catname'] ?></span></h6>
                        <span>Release Date: <?= $data['releasedate'] ?></span>
                        <span><?= $data['timing'] ?> <span><?= $data['days'] ?></span></span>
                        <span><?= $data['location'] ?></span>
                        <h4>Per Ticket: Rs.<?= $data['price'] ?></h4>
                        <a href="booking.php?id=<?=$data['theaterid']?>" target="_blank" class="btn btn-primary"> Book Now </a>
                    </div>
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



    

           