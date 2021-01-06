<?php 
 
    include "./value.php";
 
    if (!isset($_GET['user_id']) || !isset($_GET['password'])) 
        die("parameter error!"); 
 
    if (($_GET['user_id'] == 'admin') && (strcmp($ps, $_GET['password']) == 0)) {
        die("$pass");
    } else {
        die("login failed..");
    } 
        
 
?>