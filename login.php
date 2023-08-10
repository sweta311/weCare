<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/animations.css">   -->
    <!-- <link rel="stylesheet" href="css/main.css">   -->
    <!-- <link rel="stylesheet" href="css/login.css"> -->



    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style1.css" />
    <title>WeCare</title>

        
    <!-- <title>Login</title> -->

    
    
</head>
<body>
    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
    include("connection.php");

    



    if($_POST){

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                //TODO
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){


                    //   Patient dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    
                    header('location: patient/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password<a href="login.php">Retry</a></label>';
                }

            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password <a href="login.php">Retry</a></label>';
                  
                }


            }elseif($utype=='d'){
                //TODO
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows==1){


                    //   doctor dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password<a href="login.php">Retry</a></label>';
                }

            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.<a href="login.php">Retry</a></label>';
        }






        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>





    <center>






    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">



          <form action="#" method="POST" class="sign-in-form">
            <h2 class="title">Login</h2>
<?php echo $error ?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="useremail" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="userpassword" placeholder="Password" />
             
             
                
            
             
            </div>
            

            <input type="submit" value="Login" class="btn solid" />

            <p class="social-text">Don't Have Account ? <a href="signup.php" class="hover-link1 non-style-link">Create Account</p>
            <div class="social-media">
              <a href="https://m.facebook.com/sunnywalia212" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com/Sweta6649276456?t=E7-nNkqg6MZzhCpoLECuMw&s=09" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="sweta45554@gmail.com" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="https://www.linkedin.com/in/sweta-1112bb210/" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>



          </form>

                  


          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>For Create a New Account</h3>
            <p>
            Please enter your details and the login page allows a user to gain access to an application by entering their username and password or by authenticating using a social media login.
            </p>


            <p class="social-text">Don't Have Account ? <a href="signup.php" class="hover-link1 non-style-link">Create Account</p>

          <img src="img/register.svg" class="image" alt="Register" />
        </div>
      
        
      </div>
    </div>



</center>
</body>
</html>