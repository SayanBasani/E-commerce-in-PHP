<?php 
session_start();
session_unset();

header("location: ./user_account/user_login.php");
?>