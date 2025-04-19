<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Restaurants</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
   
</head>

<body>

        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark" style=" background-image: url('images/img/pimp.jpg');">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo1.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Mess<span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
							}
						else
							{
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                                        echo  '<li class="nav-item"><a href="cart.php" class="nav-link active">My cart</a> </li>';
									    echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
					                    echo  '<li class="nav-item"><a href="MyProfile.php" class="nav-link active">Hi &nbsp;'.$_SESSION["username"].'</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
<div class="page-wrapper">
    <!-- <div class="inner-page-hero bg-image" data-image-src="images/img/pimp.jpg" style="height:400px">
        <div class="container"> </div>
    </div> -->
    <div class="result-show">
        <div class="container">
            <div class="row"><h3></h3></div>
        </div>
    </div>
    <section class="restaurants-page">
    <div class="container" style="border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <h3>All Mess</h3>
        <table class="table" style="margin-top: 30px;margin-bottom: 30px; border-radius: 5px;">
            <thead style="background-color: #3aafa9; color: white;">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody style="background-color: #def2f1;">
                <?php
                $ress = mysqli_query($db, "SELECT * FROM restaurant");
                while ($rows = mysqli_fetch_array($ress)) {
                    echo '<tr>';
                    echo '<td>';
                    echo '<a href="dishes.php?res_id=' . $rows['rs_id'] . '">';
                    echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Food logo" style="width: 100px; height: auto;">';
                    echo '</a>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="dishes.php?res_id=' . $rows['rs_id'] . '">' . $rows['title'] . '</a>';
                    echo '</td>';
                    echo '<td>';
                    echo $rows['address'];
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn btn-purple" style="background-color: #000000; color: white; border-radius: 5px;" >Menu</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="bottom-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                    <h5>Payment Options</h5>
                </div>
                <div class="col-xs-12 col-sm-4 address color-gray">
                    <h5>Address</h5>
                    <p>Yashwant Galaxy, 001, Y K nagar, Ganpati Mandir Road</p>
                    <h5>Phone: 8788064485</a></h5>
                </div>
                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                    <h5>Additional informations</h5>
                    <p>Join thousands of other restaurants who benefit from having partnered with us.</p>
                    <ul>
                        <a href="" style="text-decoration:none;color:#ffffff;"><li>AboutUs</li></a>
                    <a href="feedback.php" style="text-decoration:none;color:#ffffff;"><li>Feddback</li></a>
                    </ul>
                </div>
           
            </div>
            <div class="copyright" style="text-align:center;margin-top:40px;">
            <div>
            <h2 style="color: white;">Created By Yash Shetye</h2>
            </div>
           
            <p>© 2024, OnlineTiffinService.com, Inc. or its affiliates</p>
            </div>
        </div>
    </div>
</footer>
        
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>