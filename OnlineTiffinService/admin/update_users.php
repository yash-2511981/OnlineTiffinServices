<!DOCTYPE html>
<html lang="en">
<?php


session_start();
error_reporting(0);
include("../connection/connect.php");

if(isset($_POST['submit'] ))
{
    if(empty($_POST['uname']) ||
   	    empty($_POST['fname'])|| 
		empty($_POST['lname']) ||  
		empty($_POST['email'])||
		empty($_POST['password'])||
		empty($_POST['phone']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Required!</strong>
															</div>';
		}
	else
	{
		

	
	
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid email!</strong>
															</div>';
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Password must be >=6!</strong>
															</div>';
	}
	
	elseif(strlen($_POST['phone']) < 10)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid phone!</strong>
															</div>';
	}
	
	else{
       
	
	$mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='".md5($_POST[password])."' where u_id='$_GET[user_upd]' ";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>User Updated!</strong></div>';
	
    }
	}

}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Users</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
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

<body class="fix-header">
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
   
        <div class="page-wrapper" style="background-color: transparent;">
            <div class="container-fluid">
                     <div class="row">
					 <div class="container-fluid">
									<?php  
									     echo $error;
									     echo $success; 
									?>
					    <div class="col-lg-12" style="box-shadow:1px 1px 5px black;border-radius:10px;background-color:#def2f1;">
                        <div class="card card-outline-primary" style="background-color:#def2f1;">
                            <div class="card-header" style="background-color:#2b7a78;box-shadow:4px 4px 15px black;border-radius:25px;margin-bottom:15px;">
                            <h4 class="m-b-0 text-white" style="text-align:center;"><b>Update User</b></h4>
                            </div>
                            <div class="card-body">
							  <?php $ssql ="select * from users where u_id='$_GET[user_upd]'";
													$res=mysqli_query($db, $ssql); 
													$newrow=mysqli_fetch_array($res);?>
                                <form action='' method='post'  >
                                    <div class="form-body">
                                      
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" name="uname" class="form-control" value="<?php  echo $newrow['username']; ?>" placeholder="username" style="border-radius:5px;border:1px solid lightblue;">
                                                   </div>
                                            </div>
                                     
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">First-Name</label>
                                                    <input type="text" name="fname" class="form-control form-control-danger"  value="<?php  echo $newrow['f_name'];  ?>" placeholder="" style="border-radius:5px;border:1px solid lightblue;">
                                                    </div>
                                            </div>
                                      
                                        </div>
                                    
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last-Name </label>
                                                    <input type="text" name="lname" class="form-control" placeholder="doe"  value="<?php  echo $newrow['l_name']; ?>" style="border-radius:5px;border:1px solid lightblue;">
                                                   </div>
                                            </div>
                                     
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control form-control-danger"  value="<?php  echo $newrow['email'];  ?>" style="border-radius:5px;border:1px solid lightblue;">
                                                    </div>
                                            </div>
                                        
                                        </div>
                                   
										 <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input type="text" name="password" class="form-control form-control-danger"   value="<?php  echo $newrow['password'];  ?>"  style="border-radius:5px;border:1px solid lightblue;">
                                                    </div>
                                                </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone</label>
                                                    <input type="text" name="phone" class="form-control form-control-danger"   value="<?php  echo $newrow['phone'];  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                 
                                            
                                      
                                        
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save" style="background-color:#17252a; color:white;border-radius:5px;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#17252a';"> 
                                        <a href="all_users.php" class="btn btn-danger">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
       
            </div>
      

        
        </div>
        <footer class="footer"> © 2022 - Online Food Ordering System </footer>
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