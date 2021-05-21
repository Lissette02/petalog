<?php

session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: index.php");
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
        <li > <a  href="http://localhost/PetAdopt/favorites.php">Favorites</a>  </li>
        <li > <a   href="http://localhost/PetAdopt/logout.php">Logout</a>  </li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>


<!--content-->
<!--form-->


<div style="float:right; margin-right:15px " class="center orange">











</div>

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






<div style="margin-left:15px; width:13%; position:absolute; z-index:2">


  <form autocomplete="off" action="quick_postv1.php" method="post">
    <button class="waves-effect waves-light btn modal-trigger  orange center" type="submit" name='all' style="margin-bottom:15px">Load all pets!</button>
    <!-- <input lass="waves-effect waves-teal btn-flat" type='submit' name='all' /> -->
    </form>

    <!-- <hr style="display: block; height: 1px;
    border: 0; border-top: 3px solid #987654;
    margin: 1em 0; padding: 0;"> -->
<br>

    <form autocomplete="off" action="quick_postv2.php" method="post">

    <div class="input-field col s12">
    <select name="column">
        <option value="">Choose Option</option>
        <option value="gender">Gender</option>
        <option value="color">Color</option>
        <option value="shelter_name">Shelter</option>
    </select>
    <label>Feature</label>
    </div>

    <div class="input-field col s12">
    <input type="text" name="search"><br>
    <label>Input</label>
    </div>

    <button class="waves-effect waves-light btn modal-trigger  orange center" type="submit" >Search</button>

    </form>

<br>
    <!-- <hr style="display: block; height: 1px;
    border: 0; border-top: 3px solid #987654;
    margin: 1em 0; padding: 0;"> -->


    <form autocomplete="off" action="quick_postv3.php" method="post">
    <p>Live in an apartment? No yard? Search for pets that do not need a fenced yard!</p>
    <button class="waves-effect waves-light btn modal-trigger  orange center" type="submit" name='yard' style="margin-bottom:15px">No yard</button>
    <!-- <input lass="waves-effect waves-teal btn-flat" type='submit' name='all' /> -->
    </form>



</div>











<div class="container">
  <div class="row">

  <?php
      require_once("query/query2.php");
      getQuery2();
    ?>

  </div>

  <a class="waves-effect waves-light btn center" style="margin-left: 50%; margin-bottom: 20px;">Load More</a>
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