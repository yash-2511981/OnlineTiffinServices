<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");

session_start();
 require 'vendor/autoload.php'; // Include Razorpay SDK

use Razorpay\Api\Api;

$api = new Api('rzp_test_DM3gWFYJmst6Yu', 'XAXkTRokhDJk0ZQXAawMhnD9');
    $order = $api->order->create(
        array(
            'receipt' => 'order_rcptid_' . time(),
            'amount' => $_SESSION['finalamount'] * 100, // Amount in paise
            'currency' => 'INR',
        )
    );

    if (!empty($order['id'])) {
        $_SESSION['order_id'] = $order['id'];
        

        ?>
        <div  style="display:none">
        
        <form action="orderconfirm.php" method="post"> 
            <script src="https://checkout.razorpay.com/v1/checkout.js" 
            data-key="<?php echo 'rzp_test_DM3gWFYJmst6Yu'; ?>"
            data-amount="<?php echo $_SESSION['finalamount'] * 100; ?>" 
            data-currency="INR"
            data-order_id="<?php echo $order['id']; ?>"
            data-buttontext="Pay Now">
            data-name="<?php 'Food Store'; ?>";
            id="razorpayButton">
            <?php 
            if(empty($_SESSION["user_id"]))
            {
                header('location:login.php');
            }
            
            else
            {
               

                $Method="Online";
                $pstatus="Paid";
                $GST=$_SESSION["item_price"]*18/100;

                //Query for inserting value in users_orders table//
                $SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$_SESSION['Final-Title']."','".$_SESSION['Final-Quantity']."','".$_SESSION['item_price']."')";
                mysqli_query($db,$SQL);

              
                // Get the ID of the last inserted order
                $query_res = mysqli_query($db, "SELECT LAST_INSERT_ID() as o_id");
                $row = mysqli_fetch_array($query_res);
                $o_id = $row['o_id'];

                //Query for inserting value in billrecords table//
                $BILL="INSERT INTO `billrecords` (`o_id`,`username`, `ItemName`, `quantity`, `itemprice`, `d_charge`, `gst`, `method`, `paymentstatus`) VALUES ('".$o_id."','".$_SESSION["user_name"]."', '".$_SESSION['Final-Title']."','".$_SESSION['Final-Quantity']."','".$_SESSION['item_price']."','".$_SESSION['mcharge']."','".$GST."','".$Method."','".$pstatus."')";
                mysqli_query($db,$BILL);
                
            }


            ?>
        </script>
        <button type="submit"  name="submit" style="display: none;" id="submitBtn">Submit</button>
        </form>
        </div>

        <script>
            window.onload = function() {
    //   // Select the button element
      var button = document.getElementById('submitBtn');

    //   // Define a function to simulate a click event
      function clickButton() {
        button.click(); // Trigger a click event on the button
      }

    //   // Call the clickButton function
      clickButton();
      
    };
    </script>
    
        <?php
    }

    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment payment</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- <link href="css/styl.css" rel="stylesheet"> -->
    <style>
        .container{
            height:300px;
            width:600px;
            margin-top:150px;
            padding:20px;
            background-color:black;
            display:block;
            text-align:center;
            background-color:#def2f1;
            border: 2px solid #3aafa9 ; 
            box-shadow:7px 7px 40px 3px black;
        }
        .main{
            height:100px;
            margin-top:30px;
            margin-bottom:30px;
            display:flex;
            justify-content:center;
        }
        .redirect{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .greet{
            width:100%;
            display:flex;
            align-items:center;
            justify-content:center;

        }


/*navbar style*/
.navbar {
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
  padding: 10px 0;
  position: fixed; /* Fixed positioning */
  top: 0;
  width: 100%;
  height:100px;
  display:flex;
}

.navbar .container-nav {
    padding-left:100px;
    display: flex;
    align-items: center;
}

.navbar-brand {
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}

.navbar-nav {
  display: flex;
  align-items:center;
  justify-content:flex-end ; /* Align links to the right */
}

.navbar-nav .nav-item {
  margin-left: 20px;
}

.navbar-nav .nav-link {
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
  color: #ccc;
}

.links{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    width:1000px;
    margin-right: 23px; /* Add margin to the right side */

}

    </style>
</head>
<body style="background-image: url('images/img/pimp.jpg');">
<nav class="navbar" style="background-color:transparent;">
  <div class="container-nav">
    <a href="#" class="navbar-brand">
    <img src="images/logo1.png" alt="Logo" style="height: 60px; width: auto;"> <!-- Adjust height according to navbar height -->
    </a>
</div>
    <div class="links">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="AboutUs.php" class="nav-link">About US</a></li>
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
</nav>
    <div class="container" style="background-color:#def2f1;border: 2px solid #3aafa9 ; box-shadow:10px 10px 5px 3px #3aafa9 blur inset;">
        <div class="main" style="background-color:#3aafa9;">
            <div class="greet" >
            <h1>Thank you for your order</h1>
        </div>
        </div>
        <div class="redirect">
            <a href="index.php" style="color:#17252a;"><p>Do you want to order something else?</p><input type="submit" value="Click Here" style="background-color:#17252a;border-radius:5px;height: 30px;width:150px;color:white;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#17252a';"></a>
        </div>  

    </div>
    
</body>
</html>
