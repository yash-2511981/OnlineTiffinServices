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
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
<style>
  .food-item-wrap {
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px;
    position: relative; /* Added position relative */
}

.figure-wrap {
    width: 100%;
    height: 200px; /* Adjust as needed */
    background-size: cover;
    background-position: center;
}

.description {
    padding: 15px;
    display: flex;
    flex-direction: column; /* Added flex direction */
    align-items: center; /* Center align content */
}

.description h5 {
    font-size: 18px;
    margin-bottom: 5px;
    text-align: center; /* Center align text */
}

.product-name {
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
    text-align: center; /* Center align text */
}

.price-btn-block {
    display: flex;
    flex-direction: column; /* Added flex direction */
    align-items: center; /* Center align content */
    margin-top: auto; /* Push to bottom */
}

.price {
    font-size: 16px;
    font-weight: bold;
}

.btn-secondary {
    background-color: #4158d0;
    color: #fff;
    border: 2px solid #4158d0; /* Add border */
    border-radius: 5px;
    padding: 8px 15px;
    font-size: 14px;
    text-transform: uppercase;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Add transition */
}

.btn-secondary:hover {
    background-color: #3142a5;
    border-color: #3142a5; /* Change border color on hover */
}
/* css for restaurant */
.restaurant-wrap {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    overflow: hidden;
    height: 250px; /* Set a fixed height */
    display: flex;
    flex-direction: column;
}

.restaurant-info {
    padding: 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.restaurant-logo {
    flex: 0 0 auto;
    margin-bottom: 15px;
}

.restaurant-logo img {
    width: 100px; /* Set a fixed width */
    height: 100px; /* Set a fixed height */
    object-fit: cover; /* Maintain aspect ratio and cover the container */
    border-radius: 10%;
    display: block;
    margin: 0 auto 15px;
}


.restaurant-details {
    flex: 1 1 auto;
}

.restaurant-details h5 {
    font-size: 18px;
    margin-bottom: 5px;
}

.restaurant-details p {
    font-size: 14px;
    color: #666;
    margin-bottom: 0;
}

.restaurants-filter {
    text-align: right;
}

.restaurants-filter nav ul {
    list-style: none;
    padding: 0;
}

.restaurants-filter nav ul li {
    display: inline-block;
    margin-left: 10px;
}

.restaurants-filter nav ul li a {
    color: #555;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.restaurants-filter nav ul li a.selected,
.restaurants-filter nav ul li a:hover {
    background-color: #4158d0;
    color: #fff;
}

.single-restaurant {
    margin-bottom: 20px;
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.restaurant-info {
    display: flex;
}

.restaurant-logo {
    flex: 0 0 auto;
    margin-right: 15px;
}

.restaurant-logo img {
    max-width: 100px;
    height: auto;
}

.restaurant-details {
    flex: 1 1 auto;
}

.restaurant-details h5 a {
    color: #333;
    text-decoration: none;
}

.restaurant-details p {
    color: #777;
    margin-top: 5px;
}

/* For website cycle */

</style>
</head>

<body class="home" style="background-color: #FAEBD7;">

<header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
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
<section class="hero bg-image" data-image-src="images/img/pimp.jpg">
    <div class="hero-inner">
        <div class="container text-center hero-text font-white">
            <h1 ><b>Best Service to fulfill your expectations</b> </h1>
            <div class="banner-form">
            <form class="form-inline"></form>
        </div>
        <div class="steps">
            <div class="step-item step1">
                <h4><span style="color:white;"></span>Just chose your Mess</h4>
            </div>
            <div class="step-item step2">
                    <h4><span style="color:white;"> </span>Select your favorite food</h4>
            </div>
            <div class="step-item step3">
                <h4><span style="color:white;"> </span>Oreder , Pickup and Enjoy</h4>
            </div>
        </div>
    </div>
    </div>
</section>
<!--Popular Dishes ordered-->
<section class="popular">
    <div class="container">
        <div class="title text-xs-center m-b-30" style="margin-bottom:55px;">
            <h1 style="text-shadow:3px 3px 10px grey;"><b>Some Popular dishes </b></h1>
            <p class="lead" >You can chose your favorite dish from following popular dishes</p>
        </div>
        <div class="row" >
        <div class="row">
        <div class="row">
        <div class="row">
    <?php 					
    $query_res = mysqli_query($db, "select * from dishes LIMIT 8"); 
    $count = 0;
    while($r = mysqli_fetch_array($query_res)) {
        echo '<div class="col-xs-6 col-sm-6 col-md-3 food-item" style="margin-bottom: 20px;"> <!-- Added margin-bottom -->
                <div class="food-item-wrap" style="box-shadow:5px 5px 10px 7px rgba(0, 0, 0, 0.5); overflow: hidden;">
                    <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'" style="border-radius: 10px;"></div>
                </div>
                <div class="description">
                    <h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
                    <div class="product-name">'.$r['slogan'].'</div>
                    <div class="price-btn-block">
                        <span class="price">Rs.'.$r['price'].'</span>
                        <a href="dishes.php?res_id='.$r['rs_id'].'" class="btn btn-secondary theme-btn-dash">Order</a> <!-- Removed pull-right class -->
                    </div>
                </div>
            </div>';    
        $count++;
        if($count % 4 == 0) {
            echo '</div><div class="row">';
        }
    }	
    ?>
</div>

</div>

</div>

        </div>
    </div>
</section>
 <section class="how-it-works">
    <div class="container">
        <div class="text-xs-center">
            <h2>Easy to Order</h2>
        <div class="row how-it-works-solution">
            <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                <div class="how-it-works-wrap">
                    <div class="step step-1">
                        <div class="icon" data-step="">
                        </div>
                        <h3>Select a Mess</h3>
                        <p>We"ve got your covered with menus from a variety of delivery mess online.</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                <div class="step step-2">
                    <div class="icon" data-step="">
                    </div>
                    <h3>Select your favourite dish</h3>
                    <p>We have lot of mess available here, for make your meal Enjoyable and Healthy !! .</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                <div class="step step-3">
                    <div class="icon" data-step="">
                    </div>
                    <h3>Place order and Pickup a Delivery</h3>
                    <p>Get your food delivered! And enjoy your meal</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="pay-info">Vulnerable Payment Options</p>
        </div>
    </div>
</div>
</section>

<section class="featured-restaurants">
                <div class="title-block" style="margin-bottom: 20px;">
                    <h1 style="text-align: center;"><b>Mess</b></h1> 
                </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
              
                </div>
                <div class="row">
                <div class="col-sm-8">
    <div class="restaurants-filter">
        <nav class="primary pull-left">
            <ul>
                <li><a href="#" class="selected" data-filter="*">All</a></li>
                <?php 
                    $res = mysqli_query($db, "SELECT * FROM res_category");
                    while ($row = mysqli_fetch_array($res)) {
                        echo '<li><a href="#" data-filter=".'.$row['c_name'].'">'.$row['c_name'].'</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </div>
</div>

</div>
<div class="row">
                <div class="restaurant-listing">
				<?php  
					$ress= mysqli_query($db,"select * from restaurant");  
					while($rows=mysqli_fetch_array($ress))
					{
					    $query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
						$rowss=mysqli_fetch_array($query);
						    echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rowss['c_name'].'" style="background-color: transparent; border: none;">
									    <div class="restaurant-wrap" style="height: 150px;">
									        <div class="row" >
									            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center" >
										            <a class="restaurant-logo" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo"> </a>
									            </div>
									            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
										            <h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
									            </div>
								            </div>
										</div>
									</div>';
					}
				?>
			</div>
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