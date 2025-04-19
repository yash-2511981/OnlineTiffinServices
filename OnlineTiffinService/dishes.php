<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");

error_reporting(0);
session_start();
include_once 'product-action.php'; 

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
 </head>

<body style="background-color:#ffffe0">
<header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark " style=" background-image: url('images/R.jpeg');">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo1.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                       <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Mess <span class="sr-only"></span></a> </li>
                            
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
    <!-- <div class="top-links"> -->
        <!-- <div class="container"> -->
            <!-- <ul class="row links"> -->
                <!-- <li class="col-xs-12 col-sm-4 link-item"><span></span><a href="restaurants.php"></a></li>
                <li class="col-xs-12 col-sm-4 link-item active"><span></span><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>"></a></li>
                <li class="col-xs-12 col-sm-4 link-item"><span></span><a href="#"></a></li> -->
            <!-- </ul> -->
        <!-- </div> -->
    <!-- </div> -->
	<?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
		$rows=mysqli_fetch_array($ress);
	?>
<section class="inner-page-hero bg-image" data-image-src="images/img/pimp.jpg">
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-img" style="border: none;">
                    <div class="image-wrap" style="max-width: 100% !important; height: auto !important;">
                        <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo" style="max-width: 100% !important; height: auto !important;">'; ?></figure>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                    <div class="pull-left hero-text font-white">
                        <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                        <p><?php echo $rows['address']; ?></p>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container" style="margin-top: 30px;margin-bottom: 30px; border-radius: 5px;">
    <div class="menu-widget" id="2" style="box-shadow: 0px 4px 10px black;">
        <div class="widget-heading" style="background-color: #3aafa9;">
            <h3 class="widget-title text-dark">
                MENU
                <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                    <i class="fa fa-angle-right pull-right"></i>
                    <i class="fa fa-angle-down pull-right"></i>
                </a>
            </h3>
            <div class="clearfix"></div>
        </div>
        <div class="collapse in" id="popular2" style="background-color: #def2f1;">
            <?php  
                $stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
                $stmt->execute();
                $products = $stmt->get_result();
                if (!empty($products)) {
                    foreach($products as $product) {
            ?>
            <div class="food-item">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-sm-12 col-lg-8">
                            <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                <div class="rest-logo pull-left">
                                    <a class="restaurant-logo pull-left" href="#">
                                        <?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo" style="max-height: 100px;">'; ?>
                                    </a>
                                </div>
                                <div class="rest-descr">
                                    <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                    <p><?php echo $product['slogan']; ?></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info"> 
                                <span class="price pull-left">Rs<?php echo $product['price']; ?></span>
                                <input class="b-r-0" type="text" name="quantity" style="margin-left: 30px;" value="1" size="2" />
                                <input type="submit" class="btn theme-btn" style="margin-left: 40px; background-color: #17252a; color: white; border-radius: 5px;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#17252a';" value="Add To Cart" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
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
