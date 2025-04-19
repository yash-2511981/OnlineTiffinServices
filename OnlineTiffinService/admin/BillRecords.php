<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
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

<body class="fix-header fix-sidebar">
   
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
                        📄
                        <span>Bill Records</span>
                    </a>
                </li> 
            </ul>
        </nav>
    </div>
</div>
    
        <div class="page-wrapper" style="background-image:url('imagesadmin/pimp.jpg');">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary" style="background-color:transparent;">
                            <div class="card-header" style="display:flex;background-color:#2b7a78;box-shadow:4px 4px 15px black;border-radius:25px;margin-bottom:15px;">
                            <h4 class="m-b-0 text-white" style="text-align:center;"><b>Bill Records</b></h4>                 
                            </div>
                            <?php
                            if(isset($_POST['submit'])){
                                header("location:print.php");
                            }
                            ?>
                                <div class="table-responsive m-t-40"  style="border-radius:10px;box-shadow:4px 4px 15px black;">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <thead class="thead" style="background-color:#3aafa9;">
                                            <tr>
                                                <th>Username</th>		
                                                <th>ItemName</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
												<th>Delivery Charge</th>
												<th>GST</th>												
												<th>Method</th>
												<th>Payment Status  </th>
                                                <th>PaymentId</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead >
                                        <tbody style="background-color:#def2f1;">
                                        <?php
                                                session_start();
                                                $stmt = $db->prepare("SELECT * FROM BillRecords");
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows > 0) 
                                                {
                                                    // Output data of each row
                                                    while ($row = $result->fetch_assoc()) 
                                                    {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["username"] . "</td>";
                                                        echo "<td>" . $row["ItemName"] . "</td>";
                                                        echo "<td>" . $row["quantity"] . "</td>";
                                                        echo "<td>" . $row["itemprice"] . "</td>";
                                                        echo "<td>" . $row["d_charge"] . "</td>";
                                                        echo "<td>" . $row["gst"] . "</td>";
                                                        echo "<td>" . $row["method"] . "</td>";
                                                        echo "<td>" . $row["paymentstatus"] . "</td>";
                                                        echo "<td>" . $row["paymentid"] . "</td>";
                                                        echo "<td><a href='delBill.php?delBill=" . $row['paymentid'] . "' onclick='return confirm(\"Are you sure?\");' class='btn btn-danger btn-flat btn-addon btn-xs m-b-10'><i class='fa fa-trash-o' style='font-size:16px'></i></a></td>";
                                                        echo "</tr>";

                                                        // Set session variable here
                                                        $_SESSION['paymentId'] = $row["paymentid"];
                                                    }
                                                } 
                                                else 
                                                {
                                                    echo "<tr><td colspan='10'>No records found</td></tr>";
                                                }
                                                $stmt->close();
                                                ?>                                       
                                       </tbody>
                                </table>
                            </div>
                            
                        </div>
                        
                    </div>
				</div>
            </div>
            <div class="print" style="display:flex;justify-content:center;">
                <form action="print.php" method="post" target="_blank">
                    <input type="submit" value="print" name="print" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
 
		
            <footer class="footer"> © 2024 - Online Tiffin Service</footer>
    
        </div>
   
    </div>
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    
</body>

</html>