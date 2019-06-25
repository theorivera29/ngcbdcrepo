<?php
    include "../db_connection.php";
    $acc_type = $_SESSION['acc_type'];
    $accounts_id = null;

    if (isset($_SESSION['account_id'])) {
        $accounts_id = $_SESSION['account_id'];
    }

    if(!isset($_SESSION['loggedin'])) {
	header("location: http://localhost/ngcbdcrepo/index.php");
	exit;
    }
	
    if(isset($_SESSION['loggedin'])) {
        $sql_session = "SELECT accounts_type FROM accounts WHERE accounts_id = $accounts_id;";
        $result_session = mysqli_query($conn, $sql_session);
        $row_session = mysqli_fetch_row($result_session);
        if (strcmp($row_session[0], $acc_type) != 0) {
            header("location: http://localhost/ngcbdcrepo/index.php");
            exit;
        }
    }
?>