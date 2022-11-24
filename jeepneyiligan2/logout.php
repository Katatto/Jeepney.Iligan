<?php
session_start();

include("dbcon.php");
include("function.php");

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']); 
}

header("Location: login.php");
die;


?>
