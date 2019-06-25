<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    // $from = "test@hostinger-tutorials.com";
    // $to = "theorivera29.tmk@gmail.com";
    // $subject = "Checking PHP mail";
    // $message = "PHP mail works just fine";
    // $headers = "From:" . $from;
    // mail($to,$subject,$message, $headers);
    // echo "The email message was sent.";
    
    // $from = "NGCBDC Inventory System";
    // $to = "theorivera29.tmk@gmail.com";
    // $subject = "Welcome to your NGCBDC Inventory System Account!";
    // $message = "Hello "."NAME"." Your request to reset your password has been approved. Please use the temporary password below to login. Please change your password after logging in. <br /> <br /> Password: <b>"."PASS"."</b>";
    // $headers = "Content-Type: text/html; charset=ISO-8859-1\r\nFrom: ".$from;
    // mail($to,$subject,$message, $headers);
    
    $from = "ngcbdc.inventory.system@gmail.com";
    $to = "theorivera29.tmk@gmail.com";
    $subject = "Welcome to your NGCBDC Inventory System Account!";
    $message = "Hello "."MEE"." Your request to reset your password has been approved. Please use the temporary password below to login. Please change your password after logging in. <br /> <br /> Password: <b>"."PASS"."</b>";
    $headers = "Content-Type: text/html; charset=ISO-8859-1\r\nFrom: ".$from;
    mail($to,$subject,$message, $headers);
    
    echo "The email message was sent.";
    
?>