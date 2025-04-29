<?php
include("connection/connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
session_start();

// if(isset($_POST['send'])){
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='youremail@gmail.com'; //your email 
    $mail->Password='emailpass';//your password
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('youremail@gmail.com'); //your gmail

    $mail->addAddress($_SESSION['user_email']);
    $mail->isHTML(true);
    $mail->Subject="An Email send from Online Tiffin Service";
    $mail->Body='
    <h1>Your order has been placed successfully!!</h1>

    <h2>Invoice</h2>
    <table>
    <tr>
    <td>Total Item price</td>
    <td></td>
    <td></td>
    <td>Rs.'.$_SESSION["mitemprice"].'</td>
    </tr>
    <tr>
    <td>Delivery charge</td>
    <td></td>
    <td></td>
    <td>Rs'.$_SESSION['mcharge'].'</td>
    </tr>
    <tr>
    <td>GST</td>
    <td></td>
    <td></td>
    <td>Rs.'.$_SESSION['mgst'].'</td>
    </tr>
    <tr>
    <td>Total Price</td>
    <td></td>
    <td></td>
    <td>Rs.'.$_SESSION['final_price'].'</td>
    </tr>
    </table>
    <h2>Thank you for your order!</h2>

';

    $mail->send();

echo "<script>;
        document.location.href='razorpay.php';
    </script>";




// }


?>
