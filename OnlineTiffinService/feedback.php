<?php
include("connection/connect.php");  
error_reporting(0);  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Feedback Received</title>
<link rel="stylesheet" href="styles.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
<style>

.feedback img {
  display: block;
  margin: 0 auto 10px;
  width: 100px; /* Adjust the width as needed */
  height: 100px; /* Adjust the height as needed */
  border-radius: 50%; /* Add a white border around the image */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
}

.feedback img:hover {
  transform: scale(1.1); /* Add a slight zoom effect on hover */
}

    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.containers {
  width: 80%;
  margin: 50px auto;
  padding-top: 70px;
  
}

.container-inside{
    width:100%;
    display:flex;
    justify-content: space-evenly;
}

h1 {
  text-align: center;
}

.feedback-list {
  margin-top: 20px;
}

.feedback {
    width: 500px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 30px;
  background-color:#def2f1;;
  border:2px solid #3aafa9;
  box-shadow:4px 4px 15px black;
   color:#3aafa9;
}

.feedback h2 {
  margin-top: 0;
}

.feedback-type {
  font-weight: bold;
}

.feedback-time {
  color: #888;
  font-size: 0.8em;
}

/* Navbar styles */
.navbar {
  padding: 10px 0;
  position: fixed; /* Fixed positioning */
  top: 0;
  width: 100%;
  height:100px;
  display:flex;
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

<section>
  <div class="containers">
    <h1><b style="text-shadow:3px 3px 10px white;color:white;">Feedback Received</b></h1>
    <div class="feedback-list">
    <div class="container-inside">
      <div class="feedback" >
      <img src="images/user1.png">
        <h2><b>Nitesh</b></h2>
        <p class="feedback-type">Suggestion</p>
        <p class="feedback-comment">I really enjoyed the variety of dishes offered by the tiffin service. The flavors were authentic, and the ingredients tasted fresh. However, I noticed that the portion sizes were inconsistent across meals, with some dishes feeling a bit smaller than expected.</p>
        <p class="feedback-time">Received on: January 1, 2024</p>
        <a href="index.php" style="font-size: 11px;">Go back to the home page</a>
      </div>
      <div class="feedback">
      <img src="images/User2.png">
        <h2><b>Prakash</b></h2>
        <p class="feedback-type">Suggestion</p>
        <p class="feedback-comment">The delivery service was generally reliable, and my meals usually arrived on time. However, there were a couple of instances where my food arrived later than expected, which was inconvenient. It would be helpful to receive real-time updates on the delivery status to better plan my meals.</p>
        <p class="feedback-time">Received on: January 2, 2024</p>
        <a href="index.php" style="font-size: 11px;">Go back to the home page</a>
      </div>
      </div>
      <div class="container-inside">
      <div class="feedback">
      <img src="user1.jpg" alt="User A">
        <h2><b>Abhishek</b></h2>
        <p class="feedback-type">Complaint</p>
        <p class="feedback-comment">I had an issue with one of my orders, and I contacted customer service for assistance. The representative I spoke with was very friendly and helpful in resolving the issue promptly. I appreciate the excellent customer service experience and the quick resolution provided.</p>
        <p class="feedback-time">Received on: February 7, 2024</p>
        <a href="index.php" style="font-size: 11px;">Go back to the home page</a>
      </div>
      <div class="feedback">
      <img src="user1.jpg" alt="User A">
        <h2><b>Nihal</b></h2>
        <p class="feedback-type">Suggestion</p>
        <p class="feedback-comment">While I enjoy the current menu offerings, I would love to see more options for vegetarian and vegan dishes. Additionally, it would be great if the tiffin service could introduce some seasonal specials or rotating menu items to add variety and excitement to the menu.</p>
        <p class="feedback-time">Received on March 28, 2024</p>
        <a href="index.php" style="font-size: 11px;">Go back to the home page</a>
      </div>
        </div>
      <!-- Add more feedback entries here -->
    </div>
  </div>
  </section>
</body>
</html>
