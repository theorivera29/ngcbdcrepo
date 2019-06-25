<?php
    $host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'ngcbdc';
	$conn = mysqli_connect($host, $user, $pass, $db) or die('Cannot connect to db');
	date_default_timezone_set('Asia/Manila');
?>