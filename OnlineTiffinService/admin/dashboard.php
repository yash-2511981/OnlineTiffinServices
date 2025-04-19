<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .card {
            background-color: #def2f1;
            box-shadow: 2px 2px 10px black;
            border-radius: 15px; /* Added border-radius */
            margin-bottom: 20px; /* Increased margin for spacing */
        }
        
        .cards{
            /* margin-top:20px; */
        }
        .card-header {
            background-color: #2b7a78;
            box-shadow: 4px 4px 15px black;
            border-radius: 25px;
            margin-bottom: 15px;
        }

        .card-body {
            padding: 30px; /* Added padding for spacing */
        }

        .media {
            margin-bottom: 0; /* Removed default margin */
        }

        .media-body {
            padding-left: 20px; /* Added padding for spacing */
        }

        .media-text-right {
            text-align: right; /* Aligning text to the right */
        }

        .fa {
            color: #000000; /* Adjusted icon color */
        }

        .left-sidebar {
    background-color: #FAEBD7;
    width: 250px;
    padding-top: 20px;
    font-family: Arial, sans-serif; /* Apply the same font family as the body */
}

.left-sidebar .scroll-sidebar {
    overflow-y: auto;
    height: calc(100vh - 20px); /* Adjust height as needed */
}

.left-sidebar .sidebar-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.left-sidebar .sidebar-nav ul li {
    padding: 10px 20px;
}

.left-sidebar .sidebar-nav ul li a {
    text-decoration: none;
    color: #000;
    display: block;
}

.left-sidebar .sidebar-nav ul li a:hover {
    color: #007bff;
}

.left-sidebar .nav-label {
    padding: 10px 20px;
    font-weight: bold;
    color: #000;
}

.left-sidebar .has-arrow .collapse {
    display: none;
}

.left-sidebar .has-arrow.active .collapse {
    display: block;
}
  </style>
</head>

<body class="fix-header" >

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div id="main-wrapper" style="background-image:url('imagesadmin/pimp.jpg');">
     
        <div class="header" style="background-color: #FAEBD7;">
            <nav class="navbar top-navbar navbar-expand-md navbar-light" style="background-color: #FAEBD7;">

                <div class="navbar-header" style="width:95%;display:flex;justify-content:flex-start;background-color: #FAEBD7;">
                    <a class="navbar-brand" href="dashboard.php" style="margin-left:15px;">
                        
                        <span><img src="imagesadmin/bookingSystem/logo5.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>

                <div class="navbar"  style="display:flex;justify-content:flex-end;">
                    <ul class="navbar-nav mr-auto mt-md-0" >
                    <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="imagesadmin/bookingSystem/user.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
      
        <div class="left-sidebar" style="width: 250px; padding-top: 20px;">
    <div class="scroll-sidebar"  style="background-color: #FAEBD7;">
        <nav class="sidebar-nav" style="background-color: #FAEBD7;">
            <ul id="sidebarnav">
                <li class="nav-label" style="padding: 10px 20px; font-weight: bold;">Home</li>
                <li style="padding: 10px 20px;"> 
                    <a href="dashboard.php" style="background-color: transparent;">
                        📊
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-label" style="padding: 10px 20px; font-weight: bold;">Log</li>
                <li style="padding: 10px 20px;"> 
                    <a href="all_users.php" style="background-color: transparent;">
                        👥
                        <span>Users</span>
                    </a>
                </li>
                <li style="padding: 10px 20px;"> 
                    <a href="#" class="has-arrow" aria-expanded="false" style="background-color: transparent;">
                        🍽️
                        <span class="hide-menu">Restaurant</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="all_restaurant.php">All Mess</a></li>
                        <li><a href="add_category.php">Add Category</a></li>
                        <li><a href="add_restaurant.php">Add Mess</a></li>
                    </ul>
                </li>
                <li style="padding: 10px 20px;"> 
                    <a href="#" class="has-arrow" aria-expanded="false" style="background-color: transparent;">
                        📋
                        <span class="hide-menu">Menu</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="all_menu.php">All Menus</a></li>
                        <li><a href="add_menu.php">Add Menu</a></li>
                    </ul>
                </li>
                <li style="padding: 10px 20px;"> 
                    <a href="all_orders.php" style="background-color: transparent;">
                        🛒
                        <span>Orders</span>
                    </a>
                </li>
                <li style="padding: 10px 20px;" style="background-color: transparent;"> 
                    <a href="BillRecords.php" >
                    <div class=adm-link style="background-color: transparent;">
                        📄
                        <span>Bill Records</span>
                        </div>
                    </a>
                </li> 
            </ul>
        </nav>
    </div>
</div>

        <div class="page-wrapper" style="background-color:Transparent;">
         
        
        
            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="cards card-outline-primary" style="margin-top:25px;" >
                            <div class="card-header" style="background-color:#2b7a78;box-shadow:4px 4px 15px black;border-radius:25px;margin-bottom:15px;">
                                <h4 class="m-b-0 text-white" style="text-align:center;"><b>Admin Dashboard</b></h4>
                            </div>
                     <div class="row">
                   
                    <div class="col-md-3">
                        <div class="card p-30" >
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-home f-s-40 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from restaurant";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Mess</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					 <div class="col-md-3" >
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from dishes";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Dishes</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-3">
                        <div class="card p-30" >
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="card p-30" >
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Total Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>	                   
                </div>     
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-30" >
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-th-large f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from res_category";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-spinner f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders WHERE status = 'in process' ";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Processing Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders WHERE status = 'closed' ";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Delivered Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-times f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders WHERE status = 'rejected' ";
                                        $result=mysqli_query($db,$sql); 
                                            $rws=mysqli_num_rows($result);
                                            
                                            echo $rws;?></h2>
                                    <p class="m-b-0">Cancelled Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-30" >
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><H1>Rs.</H1></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php 
                                        $result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM users_orders WHERE status = "closed"'); 
                                        $row = mysqli_fetch_assoc($result); 
                                        $sum = $row['value_sum'];
                                        echo $sum;
                                        ?></h2>
                                    <p class="m-b-0">Total Earnings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>
<?php
}
?>