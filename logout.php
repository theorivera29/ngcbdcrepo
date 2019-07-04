<?php 
    session_start();
    session_unset();
    session_destroy();
    header('location: https://inventory-system-ngbdc.hostingerapp.com/index.php');
?>