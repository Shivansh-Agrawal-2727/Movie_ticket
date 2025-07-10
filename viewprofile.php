<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        .container {
            margin-bottom: 0px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img.user-photo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<?php include('header.php') ?>

<div class="container">  
    <div class="row" style="margin-top:50px">
        <div class="col-lg-12"> 
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>     
                </tr>
                
                <?php
                $uid = $_SESSION['uid'];
                $sql = "SELECT * FROM `users` WHERE userid = '$uid'";
                $res  = mysqli_query($con, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($data = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td> </td>
                        <td>
                            <img src="profile.webp" 
                                 alt="User Photo" class="user-photo">
                        </td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['password'] ?></td>       
                    </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="5">No user found</td></tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php') ?>

</body>
</html>
