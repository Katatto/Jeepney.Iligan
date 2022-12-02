<?php
$message ="";
include("dbcon.php");

function check_login($con)
{

    if(isset($_SESSION['user_id'])) //checking if the values is in the database or it exist
    {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id ='$id' limit 1";

        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result)> 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }
    }

    //if not works out it will redirect to login
    header("Location: login.php");
    die;

}






if(isset($_POST['update_commuters']))
{

    $commuters_id = mysqli_real_escape_string($con, $_POST['commuters_id']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', contact_number='$contact_number'  WHERE user_id='$commuters_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = " Updated Successfully";
        header("Location: Profile.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Commuters Not Updated";
        header("Location: profile.php");
        exit(0);
    }

  }


  if(isset($_POST['update_emergency_contact']))
{

    $commuters_id = mysqli_real_escape_string($con, $_POST['commuters_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);

    $query = "UPDATE emergency_contact SET NAME='$name',  email='$email', contact_number='$contact_number' WHERE em_id='$commuters_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = " Updated Successfully";
        header("Location: emergency.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Updated";
        header("Location: emergency.php");
        exit(0);
    }

  }

  //delete emergency contact
if(isset($_POST['delete_emergency']))
{
    $emergency_id = mysqli_real_escape_string($con, $_POST['delete_emergency']);

    $query = "DELETE FROM emergency_contact  WHERE em_id='$emergency_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: emergency.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_FILES["fileImg"]["name"])){
    $id = $_POST["id"];

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = uniqid() . $_FILES["fileImg"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE users SET image = '$imageName' WHERE user_id = $id";
    mysqli_query($con, $query);

    header("Location: profile.php");
  }


/*if(isset($_FILES["fileImg"]["name"])){
  $id = $_POST["id"];

  $src = $_FILES["fileImg"]["tmp_name"];
  $imageName = uniqid() . $_FILES["fileImg"]["name"];

  $target = "image/" . $imageName;

  move_uploaded_file($src, $target);

  $query = "UPDATE users SET image = '$imageName' WHERE user_id = $id";
  mysqli_query($con, $query);

  header("Location: Profile.php");
} */
 

/* function random_num($length)
{
    $text ="";
    if($length<5)
    {
        $length =5;
    }
    $len =rand(4,$length);

    for ($i=0; $i <$len; $i++) //to create a random number
    {
        # code..
        $text .= rand(0,9);
    }

    return $text;
} */ 




