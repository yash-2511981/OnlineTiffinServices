<?php
include("connection/connect.php");  
error_reporting(0);  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
    <style>
        .review{
            height:auto;
            width:auto;
            margin-left:45%;
        }
    </style>
</head>
<body style="background-image: url('images/img/pimp.jpg');">

<header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark" >
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo1.png" alt=""> </a>
            <!-- <input type="text" name="searchbar" value="Search here" > -->
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Mess <span class="sr-only"></span></a> </li>
			        <?php
			            if(empty($_SESSION["user_id"])) // if user is not login
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
    <div class="container">
        <form action="post" class="review">
        <h2>Add Review</h2>
        <div>
            <textarea name="review" placeholder="Add Your Review"></textarea>
        </div>
        <div>
            <input type="submit" name="sub_rev" value="Submit"> 
        </div>
        </form>
    </div>
</div>
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
</body>
</html>