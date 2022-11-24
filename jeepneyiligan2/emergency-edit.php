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
  <link rel="stylesheet" href="css/profile.css">

  <!-- Bootstrap CSS -->
  <link href="    https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      
  <title>Home</title>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
        <h3 style="font-family:'Texturina', serif"><a 	href="index.php" target="_parent"> jeepney.Ilgn </a> <h3>
        </div>
        
        <ul>
        <li><a 	href="index.php" target="_parent">Home </a></li>
            <li><a 	href="emergency.php" target="_parent">Emergency </a></li>
            <li><a 	href="Profile.php" target="_parent"><?php echo $user_data['fname']; ?> </a></li>
            <li><a 	href="logout.php" target="_parent">logout</a></li>
        </ul>
   </nav>
   
   <div id="container">
        <!-- Form Wrap Start -->
        <div class="form-wrap">
          <h2>Edit Emergency Contacts</h2>
          <!-- Form Start -->
          
          <?php
                if(isset($_GET['id']))
                    {
                            $commuters_id = mysqli_real_escape_string($con, $_GET['id']);
                           $query = "SELECT * FROM emergency_contact WHERE em_id='$commuters_id' "; 
                            $query_run = mysqli_query($con, $query);  
                            
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $commuters = mysqli_fetch_array($query_run);
                                ?>

          <form method = "post" action="function.php">
          <input type="hidden" name="commuters_id" value="<?= $commuters['em_id']; ?>">

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="text" value="<?=$commuters['NAME'];?>">
            </div>

            <div class="form-group">
              <label for="email">email</label>
              <input type="text" name="email" id="first-name" value="<?=$commuters['email'];?>">
            </div>

            <div class="form-group">
              <label for="contact_number">Mobile Number</label>
              <input type="numbers" name="contact_number" id="first-name" value="<?=$commuters['contact_number'];?>">
            </div>

            

            <button name="update_emergency_contact" type="submit">Save</button>
          </form>
          <!-- Form Close -->
          
          <?php
                            }
                            else
                            {echo "<h4>No Such Id Found</h4>";}
                        }
                        ?>
                          
        </div>
        <!-- Form Wrap Close -->
        
      </div>
 
<script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
      <script src="./javascript/profile.js"></script>

     
</body>
</html>