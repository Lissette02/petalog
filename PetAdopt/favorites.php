<?php

include 'config.php';

error_reporting(0);

session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: index.php");
  }


  
  
  if(!isset($_SESSION["user_id"])){
      header("Location: index.php");
    }
  
    $user = $_SESSION["user_id"];
  
    if(isset($_POST["add"])){
      $pet_id = $_POST["pet_id"];
   
       $query2 = "INSERT INTO favorites (pet_id,user_id) 
       VALUES ('$pet_id', '$user') ;";
       $result = mysqli_query($conn, $query2);
       if($result){
        echo "<script>alert('successfully added');</script>";
       }else{
         echo "<script>alert('error adding pet');</script>";
       }
      
  
   
   }


// echo $_SESSION["user_id"];

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
  <nav class="#ef9a9a red lighten-3" role="navigation" id="mmm">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><i class="material-icons">pets</i>Petalog</a>
      <ul class="right hide-on-med-and-down">
      <li><a href="welcome.php">Home</a></li>
      <li > <a  href="http://localhost/PetAdopt/favorites.php">Favorites</a> </li>
        <li > <a  href="http://localhost/PetAdopt/logout.php">Logout</a>  </li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>


<!--content-->




 <!--  Scripts-->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>


  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<script>

$(document).ready(function(){
    $('select').material_select();
  });
</script>

<div class="section no-pad-bot" id="index-banner">

<div class="row">
  <div class="col s7 push-s5">
    <div class="container">
      <br><br>
      <h2 class="header center orange-text">Your Favorites</h2>
      <div class="row center">


      <div class="row">
            <form autocomplete="off" action="" method="post" class="col s12">
                <div class="row">
                    <div class="col s12 m6 l3">
                        <h5>Add Pets</h5>
                    </div>
   
                    <div class="input-field col s4">
                        <i class="material-icons prefix">pets</i>
                        <input id="icon_prefix" name="pet_id" type="text" class="validate">
                        <label for="icon_prefix">Enter PetID</label>
                    </div>
                    <div class=" col s4">
                        <button class=" btn waves-effect waves-green btn-flat" type="submit" name="add" value="add">ADD</button>
                    </div>
                </div>
            </form>
      </div>

      <ul class="collection">

            <!--1 collection php-->

            <?php
            require_once("query/add.php");
            getFavorites();
            ?>

        <!--1 collection -->
        </ul>       


    </div>



      </div>
    </div>

    



    <div class="col s5 pull-s6">
              <img src="img/cat.png" alt="favorite" style="width:500px; height:500px;">
               </div>




  </div>

 
    </div>


</div>

<!--content-->


  <footer class="page-footer #ef9a9a red lighten-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">435 Database Project</p>


        </div>
        <div class="col l3 s12">

        </div>
        <div class="col l3 s12">

        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>








 


  </body>
</html>