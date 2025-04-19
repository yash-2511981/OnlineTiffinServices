<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
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

if($_POST['place_order'])
        {
           
         header("location:orderconfirm.php");
        }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form For Online Payment</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
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
    <div class="container" style="margin-top:50px; box-shadow:7px 7px 40px 3px black;">
    <div class="container  bg-white pt-3" style="background-color:#def2f1;">
      <div class="container text-center" style="background-color:#3aafa9;">
        <h2>Payment Details</h2>
      </div>
       <form action="" method="post" >
            <div class="container" style="background-color:#def2f1;">
			    <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input class="form-control" type="text" name="username" id="example-text-input" value="<?php echo $_SESSION['username'];?>" readonly>
                    <?php session_start(); $_SESSION['user_name']=$_POST["username"];
                    ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input class="form-control" type="email" name="Email" value="<?php session_start(); echo $_SESSION['user_email'];?>" id="example-text-input" readonly> 
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact No</label>
                    <input class="form-control" type="text" name="Contact No" value="<?php ?>" id="example-text-input-2" required> 
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input class="form-control" type="text" name="Address" id="example-tel-input-3" required> 
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input class="form-control" type="text" name="Amount" value="<?php session_start(); echo  $finalamount=$_SESSION['final_price']; $_SESSION['finalamount']=$finalamount;?>" id="example-tel-input-3" readonly> 
                </div>
                <div class="row">
                    <div class="">
                        <p class="text-xs-center"> <input type="submit" value="Place Order" name="place_order" class="btn  btn-block" style="background-color:#2b7a78;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#2b7a78';" > </p>
                    </div>
                </div>
            </div>
        </form>
    
    </div>
</div>
</body>
</html>