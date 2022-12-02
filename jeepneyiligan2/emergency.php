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
  <link rel="stylesheet" href="css/emergency.css">


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
   <?php include('message.php'); ?>

   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Emergency Contacts Details
                    <a href="emergency-add.php" class="btn btn-primary float-end">Add Emergency Contact</a>
                </h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM emergency_contact where user_id ='{$_SESSION['user_id']}'";
                            $query_run = mysqli_query($con, $query);
                
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $commuters)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $commuters['NAME']; ?></td>
                                        <td><?= $commuters['contact_number']; ?></td>
                                        <td><?= $commuters['email']; ?></td>
                                      
                                        
                                        <td>
                                        <!-- <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                        
                                            <a href="emergency-edit.php?id=<?=  $commuters['em_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form  method="POST" class="d-inline">
                                                <button type="submit" name="delete_emergency" value="<?= $commuters['em_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
 
<script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
      <script src="./javascript/profile.js"></script>

     
</body>
</html>