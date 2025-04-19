<?php
include("connection/connect.php");  
error_reporting(0);  
session_start();

// session_start();
// Assuming session is started already
$emailadd= $_SESSION['user_email'];

// Assuming $db is your database connection variable
$stmt = $db->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $emailadd);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row["username"];
    $_SESSION['mobileno'] = $row["phone"];
} else {
    // Handle case where no user with the given email is found
}

$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <style>
        /* .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        } */

    .containers {
    max-width: 600px;
    margin: 50px auto;
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align:center;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 20px;
}

.form-group label {
    width: 120px;
    margin-right: 10px;
    text-align: right;
    color: #555;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group textarea {
    flex: 1;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.form-group textarea {
    height: 80px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Additional styles for the form */
.container {
    background-color: #fff;
    border: 1px solid #ddd;
}

.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus,
.form-group input[type="tel"]:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group textarea {
    transition: border-color 0.3s, box-shadow 0.3s;
}


    </style>
</head>
<body style="background-image: url('images/img/pimp.jpg');"> 
<div class="containers" style="box-shadow:4px 4px 60px 2px black;background-color:#def2f1;">
    <h1 style="text-shadow:3px 3px 10px grey;"><b>My Profile</b></h1>
    <form id="profileForm">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $row["username"];?>" Readonly>
        </div>

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $row["f_name"];?>" Readonly>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $row["l_name"];?>" Readonly>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"  value="<?php echo $row["email"];?>"  Readonly>
        </div>

        <div class="form-group">
            <label for="mobileno">Mobile Number:</label>
            <input type="tel" id="mobileno" name="mobileno" value="<?php echo $row["phone"];?>" Readonly>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" Readonly><?php echo $row["address"];?></textarea>
        </div>

        <a href="index.php" style="text-align:center;color:#17252a;">Back to The Home Page</a>
    </form>
</div>
</body>
</html>
