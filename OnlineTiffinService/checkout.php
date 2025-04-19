<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
error_reporting(0);
session_start();

function function_alert() { 
      

    echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
}


if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}

else
{
    foreach ($_SESSION["cart_item"] as $item)
	{
        $item_total += ($item["price"]*$item["quantity"]);
												
        if($_POST['submit'])
        {
            $pstatus="Unpaid";
            $Method="COD";
            $igst=$item["price"]*18/100;
            $_SESSION['mitemprice']=$item_total;

            // $_SESSION['Method']=$Method;
            if($_POST['MOD']==="COD")
            {
                //Query for inserting value in users_orders table//
                
                $SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item['price']."')";
                mysqli_query($db,$SQL);

                 // Get the ID of the last inserted order
                 $query_res = mysqli_query($db, "SELECT LAST_INSERT_ID() as o_id");
                 $row = mysqli_fetch_array($query_res);
                 $o_id = $row['o_id'];
 
                //Query for inserting value in billrecords table//
                $BILL="INSERT INTO `billrecords` (`o_id`,`username`, `ItemName`, `quantity`, `itemprice`, `d_charge`, `gst`, `method`, `paymentstatus`) VALUES ('".$o_id."','".$_SESSION['username']."', '".$item["title"]."','".$item["quantity"]."','".$item["price"]."','".$_SESSION['mcharge']."','".$igst."','".$Method."','".$pstatus."')";
                mysqli_query($db,$BILL);

                unset($_SESSION["cart_item"]);
                unset($item["title"]);
                unset($item["quantity"]);
                unset($item["price"]);
                function_alert();
                
                header("location:orderconfirmcod.php");
            }

            if($_POST['MOD']==="Online_Payment")
            {
                unset($_SESSION["cart_item"]);
                $_SESSION['item_price']=$item["price"];
                $_SESSION['Final-Title']=$item["title"];
                $_SESSION['Final-Quantity']=$item["quantity"];
                header("location:payment.php");
            }

		}
	}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet"> </head>
<body style="background-image: url('images/img/pimp.jpg');">
    
    <div class="site-wrapper">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark" style="background-color:transparent;">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo1.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
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
    <!-- <div class="top-links">
        <div class="container">
            <ul class="row links">
                <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay</a></li>
            </ul>
        </div>
    </div> -->
<div class="container" >
<span style="color:green;"><?php echo $success; ?></span>
</div>
<div class="container m-t-30" >
<form action="" method="post">
<div class="widget clearfix" style="background-color:transparent;border:none;">
<div class="widget-body">
<form method="post" action="#">
    <div class="row">
    <div class="col-sm-12">
    <div class="cart-totals margin-b-20" style="box-shadow:0px 4px 10px black;border-radius:5px">
    <div class="cart-totals-title" style="background-color:#3aafa9; Height: 50px;text-align:center;border-radius:5px 5px 0px 0px;">
        <h4>Cart Summary</h4>
    </div>
<div class="cart-totals-fields" >
    <table class="table">
		<tbody style="border-radius:0px 0px 5px 5px;">
            <tr style="background-color:#def2f1;">
                <td>Cart Subtotal</td>
                <td> <?php echo "Rs.".$item_total; ?></td>
            </tr>
            <tr style="background-color:#def2f1;">
                <td>Delivery Charges</td>
                <td><?php 
                if($item_total>500){
                    $charge=0;
                }
                else{
                 $charge="40";
                }
                 echo "Rs.".$finalcharge=$charge;
                 session_start();
                 $_SESSION['mcharge']=$finalcharge;
                 ?>
                 </td>
            </tr>
            <tr style="background-color:#def2f1;">
                <td>GST%</td>
                <td> Rs.<?php echo $gst=$item_total*18/100;
                 session_start();
                  $_SESSION['mgst']=$gst;?></td>
            </tr>
            <tr style="background-color:#3aafa9;">
                <td class="text-color"><strong>Total</strong></td>
                <td class="text-color" ><strong> <?php echo "Rs.".$final_price=$item_total+$charge+$gst; session_start(); $_SESSION['final_price']=$final_price;?></strong></td>
            </tr>
        </tbody>
    </table>
</div>
    </div>
        <div class="payment-option" style="background-color:#def2f1;box-shadow:0px 4px 10px black;border-radius:0px 0px 5px 5px;">
            <ul class=" list-unstyled">
            <li>
            <label class="custom-control custom-radio  m-b-20">
                <input name="MOD" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input" > <span class="custom-control-indicator"></span> <span class="custom-control-description" >Cash on Delivery</span>
            </label>
            </li>
            <li>
            <label class="custom-control custom-radio  m-b-10">
            <input name="MOD"  type="radio"  value="Online_Payment"  class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Online Payment</span> </label>
            </li>
            </ul>
            <p class="text-xs-center"> <input type="submit"   name="submit"  class="btn btn-success btn-block" value="Order Now" style="background-color:#2b7a78;border-radius:0px 0px 5px 5px;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#2b7a78';"> </p></div>
	</form>
    </div>
    </div>
    </div>
    </div>
</form>
</div>
            <footer class="footer" style=" background-image: url('images/R.jpeg');">
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                    <h5>Payment Options</h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                <h5>Address</h5>
                                    <p>Yashwant Galaxy, 001, Y K nagar, Ganpati Mandir Road</p>
                                    <h5>Phone: 8788064485</a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Additional informations</h5>
                                   <p>Join thousands of other restaurants who benefit from having partnered with us.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
         </div><?php
         ?>

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

<?php
}
?>
