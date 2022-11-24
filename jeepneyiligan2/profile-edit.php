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
           <h3 style="font-family:'Texturina', serif"> jeepney.Ilgn <h3>
        </div>
        
        <ul>
            <li><a 	href="Profile.php" target="_parent"><?php echo $user_data['fname']; ?> </a></li>
            <li><a 	href="logout.php" target="_parent">logout</a></li>
        </ul>
   </nav>

   <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="./img/profile_pic.jpg">
            <span class="font-weight-bold"><?php echo $user_data['fname']; ?></span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
        <?php
                if(isset($_GET['id']))
                    {
                            $user_id = mysqli_real_escape_string($con, $_GET['id']);
                           $query = "SELECT * FROM users WHERE user_id='$user_id' "; 
                            $query_run = mysqli_query($con, $query);  
                            
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $commuters = mysqli_fetch_array($query_run);
                                ?>
            <form method = "POST">
            <input type="hidden" name="commuters_id" value="<?=  $commuters['user_id']; ?>">
            
            <div method = "post" class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label>
                        <input class="form-control" name="fname" value="<?=$commuters['fname'];?>"></div>

                    <div class="col-md-6"><label class="labels">Surname</label>
                        <input  class="form-control" name="lname" value="<?=$commuters['lname'];?>" ></div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label>
                        <input  name="email" class="form-control"  value="<?=$commuters['email'];?>"></div>

                        <div class="col-md-12"><label class="labels">Contact Number</label>
                        <input  type = "number" name="contact_number" class="form-control"  value="<?=$commuters['contact_number'];?>"></div>

                   <!-- <div class="col-md-12"><label class="labels">Address</label>
                        <input type="text" name="email"class="form-control" value="<?=$commuters['fname'];?>"></div> -->
                
                    </div>
                <div class="mt-5 text-center"><button type="submit" name="update_commuters"  class="btn btn-primary profile-button">Save Profile</button></div>
            </div>
            </form >

            <?php
            }
        }
          else
             { echo "<h4>No Such Id Found</h4>";}
    
    ?>
      <!--  </div>

         <div class="col-md-4">
               <div class="p-3 py-5">
                   <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                   <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                   <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
              </div>
        </div> -->

        </div>
</div>
</div>
</div>
<script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>