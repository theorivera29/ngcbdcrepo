<?php
    include "../db_connection.php";
    if(isset($_POST['username'])) {
        $username = strip_tags(mysqli_real_escape_string($conn, $_POST['username']));
        $check = mysqli_query($conn, "SELECT accounts_username FROM accounts WHERE accounts_username = '$username';");
        $rows = mysqli_num_rows($check);
        
        if (ctype_alnum($username)) {
            if (strlen($username) <= 4) {
                echo 3;
            } else if (strlen($username) >= 19) {
                echo 4;
            } else {
                if ($rows == 0) {
                    echo 1;
                } else {
                    echo 2;
                }   
            }
        } else {
            echo 5;
        }
    }
    
    if(isset($_POST['email'])) {
        $email = strip_tags(mysqli_real_escape_string($conn, $_POST['email']));
        $email = str_replace(" ", "", $email);
        $check = mysqli_query($conn, "SELECT accounts_email FROM accounts WHERE accounts_email = '$email';");
        $rows = mysqli_num_rows($check);
        $pattern = "*@*";
        if(preg_match($pattern, $email)) {
            if ($rows == 0) {
                echo "Email address is available.";
            } else {
                echo "Email address is not available.";
            }   
        } else {
            echo "Invalid email.";
            
        }
    }
?>