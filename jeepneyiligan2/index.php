<?php

session_start();

include("dbcon.php");
include("function.php");

$user_data = check_login($con); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title>Home</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
</head>

<body>
      <nav class="navbar">
        <div class="logo">
           <h3 style="font-family:'Texturina', serif"> jeepney.Ilgn<h3>
        </div>
        
        <ul>
            <li><a 	href="index.php" target="_parent">Home </a></li>
            <li><a 	href="emergency.php" target="_parent">Emergency </a></li>
            <li><a 	href="Profile.php" target="_parent"><?php echo $user_data['fname']; ?> </a></li>
            <li><a 	href="logout.php" target="_parent">logout</a></li>
        </ul>
     </nav>

        <div id="sideMenu" class="menu">
            <a href="javascript:void(0)" class="c-btn" onclick="closeMenu()">&times;</a>
            <img src="img/JIlgn.LOGO.png">
            <input type="text" name="findplace" placeholder="Find Place">
            <input type="text" name="location" placeholder="Current Location">
            <input type="text" name="destination" placeholder="Destination">
            

            </div>

        <div id="move">
          <span style="cursor:pointer" onclick="openMenu()">&#9776; </span> 
         <!-- <h2>Jeepney.Ilgn</h2>
            <p>Map view here</p> -->


        </div>
            <div id ="map" class = "map"> </div>
          <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>    


  <!-- <h1 style="  text-align: center"> Welcome to the Jeepney.Ilgn </h1>

   <h3 style="  text-align: center"> Hello, <?php echo $user_data['fname'] ." ".  $user_data['lname']; ?> </h3>-->

        <script src="./javascript/sys.js"></script>  
        <script src="./javascript/map.js"></script>  

</body>
</html>