<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/autoload.php';

$mail = new PHPMailer(true);

try {
    // $mail->isSMTP();                                           
    // $mail->SMTPDebug = 2;
    // $mail->Host = 'smtp.hostinger.com';
    // $mail->Port = 587;                                 
    // $mail->Username   = 'ngcbdc.inventory.system@gmail.com';                   
    // $mail->Password   = 'ngcbdcpassword';                               
    // $mail->setFrom('ngcbdc.inventory.system@gmail.com', 'NGCBDC');

    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'ngcbdc.inventory.system@gmail.com';                   
    $mail->Password   = 'ngcbdcpassword';                              
    $mail->SMTPSecure = 'ssl';                                  
    $mail->Port       = 465;                                    
    $mail->setFrom('ngcbdc.inventory.system@gmail.com', 'NGCBDC');
} catch (Exception $e) {}
?>