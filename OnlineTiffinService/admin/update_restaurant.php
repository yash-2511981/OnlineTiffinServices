<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))        
{
	if(empty($_POST['c_name'])||empty($_POST['res_name'])||$_POST['email']==''||$_POST['phone']==''||$_POST['url']==''||$_POST['o_hr']==''||$_POST['c_hr']==''||$_POST['o_days']==''||$_POST['address']=='')
	{	
		$error = '<div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>All fields Must be Fillup!</strong>
		</div>';							
	}
	else
	{
		$fname = $_FILES['file']['name'];
		$temp = $_FILES['file']['tmp_name'];
		$fsize = $_FILES['file']['size'];
		$extension = explode('.',$fname);
		$extension = strtolower(end($extension));  
		$fnew = uniqid().'.'.$extension;
        $store = "Res_img/".basename($fnew);                   
		    if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
			{        
		    	if($fsize>=1000000)
		    		{
		    	        $error = 	'<div class="alert alert-danger alert-dismissible fade show">
		    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    			<strong>Max Image Size is 1024kb!</strong> Try different Image.
		    			</div>';
		    		}
		    	else
					{
		            	$res_name=$_POST['res_name'];
		            	$sql = "update restaurant set c_id='$_POST[c_name]', title='$res_name',email='$_POST[email]',phone='$_POST[phone]',url='$_POST[url]',o_hr='$_POST[o_hr]',c_hr='$_POST[c_hr]',o_days='$_POST[o_days]',address='$_POST[address]',image='$fnew' where rs_id='$_GET[res_upd]' ";  // store the submited data ino the database :images												mysqli_query($db, $sql); 
		            		mysqli_query($db, $sql); 
		            	    move_uploaded_file($temp, $store);
		            		$success = 	
                            '<div class="alert alert-success alert-dismissible fade show">
		            			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            			<strong>Record Updated!</strong>.
		            		</div>';
		            }
			}
			elseif($extension == '')
			{
				$error = 
                '<div class="alert alert-danger alert-dismissible fade show">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>select image</strong>
				</div>';
			}
			else
            {
				$error = 	
                '<div class="alert alert-danger alert-dismissible fade show">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    <strong>invalid extension!</strong>png, jpg, Gif are accepted.
				</div>';
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
    <title>Update Restaurant</title>
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
      
            <!-- <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
            </div> -->
         
            <div class="container-fluid">
				<?php  
                echo $error;
				echo $success;
                ?>
		    <div class="col-lg-12" style="box-shadow:1px 1px 5px black;border-radius:10px;background-color:#def2f1;">
            <div class="card card-outline-primary" style="background-color:#def2f1;">
            <div class="card-header" style="background-color:#2b7a78;box-shadow:4px 4px 15px black;border-radius:25px;margin-bottom:15px;">
                    <h4 class="m-b-0 text-white" style="text-align:center;"><b>Update Restaurant</b></h4>
                </div>
                <div class="card-body">
                    <form action='' method='post'  enctype="multipart/form-data">
                        <div class="form-body">
                           <?php $ssql ="select * from restaurant where rs_id='$_GET[res_upd]'";
										$res=mysqli_query($db, $ssql); 
										$row=mysqli_fetch_array($res);?>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Restaurant Name</label>
                                        <input type="text" name="res_name" value="<?php echo $row['title'];  ?>" class="form-control" style="border-radius:5px;border:1px solid lightblue;">
                                       </div>
                                </div>
                       
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Bussiness E-mail</label>
                                        <input type="text" name="email" value="<?php echo $row['email'];  ?>"class="form-control form-control-danger"style="border-radius:5px;border:1px solid lightblue;" >
                                        </div>
                                </div>
                                </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone </label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];  ?>" style="border-radius:5px;border:1px solid lightblue;" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
                                                   </div>
                                            </div>
                         
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">website URL</label>
                                                    <input type="text" name="url" class="form-control form-control-danger" value="<?php echo $row['url'];  ?>" style="border-radius:5px;border:1px solid lightblue;">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Open Hours</label>
                                                    <select name="o_hr" class="form-control custom-select"  data-placeholder="Choose a Category" style="border-radius:5px;border:1px solid lightblue;">
                                                     <option>--Select your Hours--</option>
                                                        <option value="6am">6am</option>
                                                        <option value="7am">7am</option> 
														<option value="8am">8am</option>
														<option value="9am">9am</option>
														<option value="10am">10am</option>
														<option value="11am">11am</option>
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Close Hours</label>
                                                    <select name="c_hr" class="form-control custom-select"    data-placeholder="Choose a Category" style="border-radius:5px;border:1px solid lightblue;">
                                                     <option>--Select your Hours--</option>
                                                          <option value="3pm">3pm</option>
                                                        <option value="4pm">4pm</option> 
														<option value="5pm">5pm</option>
														<option value="6pm">6pm</option>
														<option value="7pm">7pm</option>
														<option value="8pm">8pm</option>
                                                    </select>
                                                </div>
                                            </div>
											 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Open Days</label>
                                                    <select name="o_days" class="form-control custom-select"  data-placeholder="Choose a Category" tabindex="1" style="border-radius:5px;border:1px solid lightblue;">
                                                        <option>--Select your Days--</option>
                                                        <option value="mon-tue">mon-tue</option>
                                                        <option value="mon-wed">mon-wed</option> 
														<option value="mon-thu">mon-thu</option>
														<option value="mon-fri">mon-fri</option>
														<option value="mon-sat">mon-sat</option>
														<option value="24hr-x7">24hr-x7</option>
                                                    </select>
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName"  class="form-control form-control-danger" placeholder="12n" style="border-radius:5px;border:1px solid lightblue;">
                                                    </div>
                                            </div>
											 <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Select Category</label>
													<select name="c_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" style="border-radius:5px;border:1px solid lightblue;">
                                                        <option>--Select Category--</option>
                                                 <?php $ssql ="select * from res_category";
													$res=mysqli_query($db, $ssql); 
													while($rows=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$rows['c_id'].'">'.$rows['c_name'].'</option>';;
													}  
                                                 
													?> 
													 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="box-title m-t-40">Restaurant Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <textarea name="address" type="text" style="height:100px;" class="form-control" style="border-radius:5px;border:1px solid lightblue;"> <?php echo $row['address']; ?> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save" style="background-color:#17252a; color:white;border-radius:5px;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#17252a';"> 
                                        <a href="all_restaurant.php" class="btn btn-danger">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					<footer class="footer"> © 2024 - Online Tiffin Service</footer>
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