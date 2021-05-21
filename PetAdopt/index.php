<?php

include 'config.php';

session_start();

error_reporting(0);

if(isset($_SESSION["user_id"])){
  header("Location: welcome.php");
}

if(isset($_POST["signup"])){
   $first_name =mysqli_real_escape_string($conn, $_POST["first_name"]);
   $last_name =mysqli_real_escape_string($conn, $_POST["last_name"]);
   $email = mysqli_real_escape_string($conn, $_POST["email"]);
   $password =mysqli_real_escape_string($conn, md5($_POST["password"]));

  $check_email =mysqli_num_rows(mysqli_query($conn, "SELECT email from user where email = '$email'"));
   if ($check_email > 0){
     echo "<script>alert('Email already exists in our database');</script>";
   }else{
    $query1 = "INSERT INTO user (first_name,last_name,email, pass) 
    VALUES ('$first_name', '$last_name', '$email', '$password' ) ;";
    $result = mysqli_query($conn, $query1);
    if($result){
      $_POST['first_name'] ="" ;
   $_POST['last_name'] = "";
    $_POST['email'] = "";
    $_POST['password'] ="";

      echo "<script>alert('user registration successful');</script>";
    }else{
      echo "<script>alert('user registration not successful');</script>";
    }
   }

}



if(isset($_POST["login"])){
  $email1 = mysqli_real_escape_string($conn, $_POST["email1"]);
  $password1 =mysqli_real_escape_string($conn, md5($_POST["password1"]));

 $check_email =mysqli_query($conn, "SELECT user_id from user where email = '$email1' AND pass='$password1' ");
 if (mysqli_num_rows($check_email) > 0){
   $row = mysqli_fetch_assoc($check_email);
   $_SESSION["user_id"] = $row["user_id"]; 
   header("Location: welcome.php");
 }else{
   echo  "<script>alert('login details are incorrect, please try again.');</script>";
 }

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Petalog</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />




    <!--fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Open+Sans&family=Poiret+One&display=swap" rel="stylesheet">

    <!--icon link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
  <nav class="#ef9a9a red lighten-3" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo"><i class="material-icons">pets</i>Petalog</a>
      <ul class="right hide-on-med-and-down">


    
        <li > <a  class="modal-trigger" data-target="signup">Sign Up</a>  </li>

        <li > <a  class="modal-trigger" data-target="login">Login</a>  </li>
      
      </ul>

  <!-- Modal for login-->
  <form autocomplete="chrome-off" method="post" action="">
                      <!-- Modal Structure -->

        <div id="login" class="modal">
          <div class="container">
            <div class="row">
                <form autocomplete="off" class="col s12" id="reg-form">

                  <div class="row">
                    <div class="input-field col s12">
                      <input autocomplete="off" id="email1" type="text" name="email1" class="validate" required>
                      <label for="email1">Email</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input autocomplete="off" id="password1" type="password" name="password1" class="validate" minlength="6" required>
                      <label for="password1">Password</label>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <a class="modal-action modal-close waves-effect waves-red btn-flat">Close</a>
                    <button class=" btn waves-effect waves-green btn-flat" type="submit" name="login" value="login">Login</button>
                  </div>

                  </div>
                </form>
              </div>
            </div>

             </div>
        </form> 

     <!-- end of Modal for login -->


     <!-- Modal for signup -->

      <form autocomplete="off" method="post" action="">
                      <!-- Modal Structure -->

        <div id="signup" class="modal">
          <div class="container">
            <div class="row">
                <form autocomplete="off" class="col s12" id="reg-form">
                  <div class="row">
                    <div class="input-field col s6">
                      <input  id="first_name" type="text" class="validate" name="first_name" required autocomplete="off">
                      <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="last_name" type="text" class="validate" name="last_name" required autocomplete="off">
                      <label for="last_name">Last Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" type="email" name="email" class="validate" required>
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="password" type="password" name="password" class="validate" minlength="6" required>
                      <label for="password">Password</label>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <a class="modal-action modal-close waves-effect waves-red btn-flat">Close</a>
                    <button class=" btn waves-effect waves-green btn-flat" type="submit" name="signup" value="signup">Register</button>
                  </div>

                  </div>
                </form>
              </div>
            </div>

             </div>
        </form>
     <!--end of  Modal for signup -->




      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">

          <div class="row">
            <div class="col s7 push-s5">
              <div class="container">
                <br><br>
                <h1 class="header center orange-text">Welcome to Petalog</h1>
                <div class="row center">
                    <h5 class="header col s12 light">A catalog to adopt pets! Browse through animals currently held in shelters by your preferences and circumstances. We aim to make your decision process easy and simple.</h5>

                    <p>sign up or login to add pets to your favroites</p>
                </div>
                <div class="row center">


                    <!-- Modal -->

                    <!-- Modal Trigger -->

                    <form   autocomplete="off" method="post" action="quick_post.php">
                      <button class="waves-effect waves-light btn modal-trigger  orange center" data-target="modal1">Search</button>

                      <!-- Modal Structure -->

                      <div id="modal1" class="modal">
                        <div class="modal-content">
                          <h4>Filter</h4>

                          <div class="row">
                            <form  autocomplete="off" class="col s12">
                              <div class="row modal-form-row">
                                <div class="input-field col s12">
                                  <input id="image_url" name="animal" type="text" class="validate">
                                  <label for="image_url">Animal</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                  <input id="zip" name="zip" type="text" class="validate" pattern="[0-9]*">
                                  <label for="zip">Zip Code</label>
                                </div>
                              </div>                  
                            </form>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <a class="modal-action modal-close waves-effect waves-red btn-flat">Close</a>
                          <button class=" btn waves-effect waves-green btn-flat" type="submit" name="action">Submit</button>
                        </div>
                      </div>
                    </form>


                    <!-- end of Modal1 -->




                </div>
                <br><br>
              </div>
            </div>
            <div class="col s5 pull-s5">
              <img src="img/petadopt1.png" alt="Adopt, don't Shop!" style="width:500px; height:500px;">
               </div>
           
          </div>



  </div>


  <div class="container">
    <div class="section center1">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">pets</i></h2>
            <h5 class="center">Search Feature</h5>

            <p class="light">Filter through our database of pets by</p>
            <p>age, color, location, breed, etc</p>
          </div>

        </div>

        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">emoji_nature</i></h2>
            <h5 class="center">Volunteer</h5>
            <p class="light">Volunteer and/or donate to local shelters in your area!</p>
            <a class="waves-effect waves-teal btn-flat">Go</a>









          </div>
        </div>

      </div>

    </div>
    <br><br>
  </div>



  <footer class="page-footer #ef9a9a red lighten-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">

        </div>
        <div class="col l3 s12">


        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" >Lissette & Farangis</a>
      </div>
    </div>
  </footer>








  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>


  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

  <script>
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
$('select').material_select();
  </script>

  </body>
</html>
