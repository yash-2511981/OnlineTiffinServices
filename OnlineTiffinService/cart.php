<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <!-- <style>
        .navbar{
            background-color:transparent;
        }
    </style> -->
</head>
<body style="background-image: url('images/img/pimp.jpg');">
 <?php include 'include/header.php';
 ?>
            
<!-- Display cart -->
<div class="container" style="height: 150px;"></div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">       
            <div class="widget widget-cart">
                <div class="widget-heading" style="background-color:#3aafa9;">
                    <h3 class="widget-title text-dark">
                        Your Cart
                    </h3>
                <div class="clearfix"></div>
            </div>
        <div class="order-row bg-white" style="background-color:#def2f1;">
    <div class="widget-body">					
    <?php
    $item_total = 0;
    foreach ($_SESSION["cart_item"] as $item)  
    {
    ?>									
									
<div class="title-row">
    <?php echo $item["title"];?><a href="cart.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
    <i class="fa fa-trash pull-right"></i></a>
    </div>
		<div class="form-group row no-gutter">
            <div class="col-xs-8">
                <input type="text" class="form-control b-r-0" value=<?php echo "Rs.".$item["price"]; ?> readonly id="exampleSelect1">
            </div>
            <div class="col-xs-4">
                <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
            </div>
									  
	        <?php
                $item_total += ($item["price"]*$item["quantity"]);
                }
            ?>								  
		</div>
    </div>
    <div class="widget-body" style="background-color:#3aafa9;">
        <div class="price-wrap text-xs-center">
            <p>TOTAL</p>
            <h3 class="value"><strong><?php echo "Rs ".$item_total; ?></strong></h3>
            <p>Free Delivery!</p>

            <?php
                if($item_total==0){
            ?>

            <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn btn-danger btn-lg disabled">Checkout</a>
            <?php
                }
                else{   
            ?>
            <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn btn-success btn-lg active" style="background-color:#17252a;">Checkout</a>
            <?php   
                }
            ?>
        </div>
    </div>
</div>
</div>

<div class="container" style="height:400px"></div>


</body>
</html>