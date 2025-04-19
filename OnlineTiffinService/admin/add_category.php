<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


if(isset($_POST['submit'] ))
{
    if(empty($_POST['c_name']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>field Required!</strong>
			</div>';
		}
	else
	{
	$check_cat= mysqli_query($db, "SELECT c_name FROM res_category where c_name = '".$_POST['c_name']."' ");
	if(mysqli_num_rows($check_cat) > 0)
    {
    $error = '<div class="alert alert-danger alert-dismissible fade show">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Category already exist!</strong>
		    </div>';
    }
	else{
	        $mql = "INSERT INTO res_category(c_name) VALUES('".$_POST['c_name']."')";
	        mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			New Category Added Successfully.</br></div>';
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
    <title>Add Category</title>
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
    <div id="main-wrapper">
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
        <div class="page-wrapper" style="background-image:url('imagesadmin/pimp.jpg');">
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
                            <h4 class="m-b-0 text-white" style="text-align:center;"><b>Add Mess Category Here</b></h4>
                            </div>
                                <form action='' method='post' >
                                    <div class="form-body">
                                       
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <input type="text" name="c_name" class="form-control" style="border-radius:5px;">
                                                   </div>
                                            </div>    
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn" value="Save"style="background-color:#17252a; color:white;border-radius:5px;" onmouseover="this.style.backgroundColor='#3aafa9';" onmouseout="this.style.backgroundColor='#17252a';" > 
                                        <a href="add_category.php" class="btn btn-danger">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
					   <div class="col-12">
                        <div class="card" style="background-color: transparent;">
                            <div class="card-body" >
                                <div style="background-color:#2b7a78;box-shadow:4px 4px 15px black;border-radius:25px;margin-bottom:15px;height: 45px;display:flex;align-items:center;justify-content:center;">
                                <h4 class="card-title"  style="text-align:center;color:white;" ><b>Listed Categories</b></h4>
                                </div>
                                <div class="table-responsive m-t-40" style="border-radius:10px;box-shadow:4px 4px 15px black;">
                                    <table id="myTable" class="table table-bordered table-hover table-striped">
                                        <thead class="thead" style="background-color:#3aafa9;">
                                            <tr>
                                                
                                                <th>Category Name</th>
                                                <th>Date</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color:#def2f1;">
											<?php
												$sql="SELECT * FROM res_category order by c_id desc";
												$query=mysqli_query($db,$sql);
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="7"><center>No Categories-Data!</center></td>';
														}
													else
														{				
								                    while($rows=mysqli_fetch_array($query))
														{
														    echo ' 
																	<td>'.$rows['c_name'].'</td>
																	<td>'.$rows['date'].'</td>
																	<td><a href="delete_category.php?cat_del='.$rows['c_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																	<a href="update_category.php?cat_upd='.$rows['c_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
																	</td></tr>';				
														}	
													    }
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>					
                </div>
            </div>
            <footer class="footer"> © 2024 - Online Tiffin Service </footer>
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