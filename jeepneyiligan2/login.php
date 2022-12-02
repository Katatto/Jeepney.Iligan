<?php


session_start();

include("dbcon.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password))
    {
        //read to database
        $query = "select * from users where email ='$email' limit 1"; 

        $result = mysqli_query($con,$query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password']== $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php"); 
                    die;
                }
    
            }
        }
        
      
       $message = "email or password incorrect";
    } else
    {
        $message = "email or password incorrect";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form method="POST" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="img/llgn.png" alt="jilgn" />
                <h4>jeepney.ilgn</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Don't have an account?</h6>
                <a href="signup.php" class="toggle">Sign up</a>
              </div>
              <p style = "color: red";>
              <?php echo $message ?>
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text" name = "email" class="input-field" autocomplete="off" required  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password" name = "password" minlength="8"  class="input-field" autocomplete="off" required />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgot password?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <div class="carousel">
                <div class="images-wrapper">
                  <img src="img/JIlgn.LOGO.png" class="image img-1 show" alt="img" />
                  <img src="./img/image2.png" class="image img-2" alt="img" />
                  <img src="./img/image3.png" class="image img-3" alt="img" />
                </div>
    
                <div class="text-slider">
                  <div class="text-wrap">
                    <div class="text-group">
                      <h2>Jeepney.Ilgn</h2>
                      <h2>"A Community-Driven Navigation System"</h2>
                      <h2>About Us</h2>
                    </div>
                  </div>
    
                  <div class="bullets">
                    <span class="active" data-value="1"></span>
                    <span data-value="2"></span>
                    <span data-value="3"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
    
        <!-- Javascript file -->
        <script src="./javascript/login.js"></script>

      </body>
    </html>
      