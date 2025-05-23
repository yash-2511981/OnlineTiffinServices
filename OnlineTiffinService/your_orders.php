<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>My Orders</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}

.panel-body {
  background: #e5e5e5;
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

}
</style>

</head>

<body style="background-image: url('images/img/pimp.jpg');">
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

<div class="page-wrapper" >
<section class="restaurants-page" >
<div class="container" style="margin-top:50px;">
<div class="row">
<div class="col-xs-12"></div>
<div class="col-xs-12">
<div class="bg-gray">
<div class="row" >
<table class="table table-bordered table-hover" style="border-radius:10%;">
	<thead style = "background-color:#3aafa9; color:white;border-radius:10px;">
	<tr>
		<th>Item Name</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Status</th>
		<th >Date</th>
		<th style="width:40px;">Action</th>
		<th style="width:100px;">PaymentBill</th>
        <th style="width:50px;">Review</th>
	</tr>
	</thead>
	<tbody style="background-color:#def2f1;">
	<?php 
		$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
		if(!mysqli_num_rows($query_res) > 0 )
		{
			echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
		}
		else
		{			      
		while($row=mysqli_fetch_array($query_res))
 		{
	?>
	<tr>	
		<td data-column="Item Name"> <?php echo $row['title']; ?></td>
		<td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
		<td data-column="price">Rs.<?php echo $row['price']; ?></td>
		<td data-column="status"> 
		<?php 
		$status=$row['status'];
		if($status=="" or $status=="NULL")
		{
			
		?>

	    <button type="button" class="btn btn-Basic"><span class="fa fa-bars"  aria-hidden="true" ></span> Dispatch</button>
	   <?php 
		  }
		   if($status=="in process")

		 { ?>

	    <button type="button" class="btn btn-info"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On The Way!</button>
		<?php
			}
		if($status=="closed")
			{
		?>

	    <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button> 
		<?php 
		} 
		?>

		<?php
		if($status=="rejected")
			{
		?>

	    <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
		<?php 
		} 
		?>
	</td>
	<td data-column="Date"> <?php echo $row['date']; ?></td>
	<td data-column="Action">
    <?php
    if($status == "closed") {
    ?>
    <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10 disabled" ><i class="fa fa-trash-o" style="font-size:16px"></i></a>
    <?php
    } elseif($status == "" || $status == NULL || $status == "in process" || $status == "rejected") {
    ?>
    <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10 active" ><i class="fa fa-trash-o" style="font-size:16px"></i></a>
    <?php
    }
    ?>
    </td>
	<td data-column="PaymentBill">
    <a href="PaymentBill.php?Order_id=<?php echo $row['o_id']; ?>">
        <input type="Button" class="btn" style="background-color:#17252a;border-radius:5px;color:white;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#17252a';" value="Invoice">
    </a>
	</td>
    <td data-colomn="Review">
        <?php
        if($status=='closed'){
            ?>
        <a href="review.php?review=<?php echo $row['o_id'];?>" class="btn btn-flat btn-addon btn-xs m-b-10 active" ><i class="fa fa-pencil" style="font-size:16px"></i></a>
        <?php
        }else{
        ?>
        <a href="review.php?review=<?php echo $row['o_id'];?>" class="btn  btn-flat btn-addon btn-xs m-b-10 disabled" ><i class="fa fa-pencil" style="font-size:16px"></i></a>
        <?php
        }
        ?>
    </td>

</tr>
<?php }} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
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
        </div>
  
    
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