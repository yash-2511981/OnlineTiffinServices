<?php

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
    $mail->Username='youremail'; //your email 
    $mail->Password='youremailpasskey';//your password
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('your_email'); //your gmail

    $mail->addAddress($_SESSION['user_email']);
    $mail->isHTML(true);
    $mail->Subject="OnlineTiffinService";
    $mail->Body=' <h1>You have succesfully regestered on OnlilneTiffinService</h1>
                    <p>Your username and password is:</p>
                <Table>
                        <tr>
                        <td>Username:</td>
                        <td>'.$_SESSION["nuname"].'</td>
                        </tr>
                        <tr>
                        <td>Password:</td>
                        <td>'.$_SESSION["npass"].'</td>
                        </tr>
                </Table>
    ';

    $mail->send();

echo "<script>;
        document.location.href='login.php';
    </script>";




// }


?>
