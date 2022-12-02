<?php
    include("dbcon.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($cpassword))
        {
            
            if ($password === $cpassword) 
           {

            // make sure the password meets the min strength requirements
              if ( strlen($password) >= 8 && strpbrk($password, "!#$.,:;()") != false )
              {
                
                 //save to database
               
                $query = "insert into users (user_id, fname, lname, email, password, cpassword) values ('$user_id', '$fname', '$lname', '$email', '$password', '$cpassword')"; 
                mysqli_query($con,$query);

                header("Location: login.php"); 
                  die;
              }
               else
                { $message ='Your password is not strong enough. Please use another.';}
            }
             else
                { $message = 'Your passwords did not match.';}
        }
         else
            { $message = 'Please fill out all required fields.';}
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up Form</title>
    <link rel="stylesheet" href="css/signup.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form method = "POST" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="img/llgn.png" alt="jilgn" />
                <h4>jeepney.ilgn</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="login.php" class="toggle">Sign in</a>
              </div>
              <p style = "color: red";>
              <?php echo $message ?>
            </p>
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name = "fname"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>First Name</label>
                </div>

                
                    <div class="input-wrap">
                      <input
                        type="text"
                        name = "lname"
                        class="input-field"
                        autocomplete="off"
                        required
                      />
                      <label>Last Name</label>
                    </div>

                <div class="input-wrap">
                  <input
                    type="email" 
                    name = "email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name = "password"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                    <input
                      type="password"
                      name = "cpassword"
                      class="input-field"
                      autocomplete="off"
                      required
                    />
                    <label>Confirm Password</label>
                  </div>
                

                <input type="submit" name = "signup" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

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
    </main>

    <!-- Javascript file -->

    <script src="./javascript/login.js"></script>
  </body>
</html>