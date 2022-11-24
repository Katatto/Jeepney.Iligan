<?php
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$dbname = "jeepneyiligan2";

if(!$con = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname))
{

    die("Failed to connect");
}

?>