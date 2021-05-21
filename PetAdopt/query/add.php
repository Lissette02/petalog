<?php

function getFavorites(){

    $db = mysqli_connect("localhost", "root", "", "petadopt");

    if ($db->connect_error){
        die("Connection Failed: " . $db->connect_error);
    }

    $user = $_SESSION["user_id"];

    if(isset($_POST['add']))
    {


$query = "SELECT p.id, p.name,s.shelter_name, f.pet_id, f.user_id FROM pets as p 
          INNER JOIN shelter as s ON p.shelter_id = s.shelter_id 
          INNER JOIN favorites as f ON p.id= f.pet_id where f.user_id = $user";

$results = mysqli_query($db, $query);


if(mysqli_num_rows($results) != 0){
  while ($row = mysqli_fetch_array($results)){
      echo '
               

      <li class="collection-item avatar">
      <img src="img/'. $row['id'].'.jpg" alt="'. $row['name'] .'" class="circle"  >
      <span class="title">'.$row['name'].'</span>
      <p>PetID: '.$row['id'].' <br>
      Shelter: '.$row['shelter_name'].'
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
                
                ';
            }
    
    } else{
        echo '
    
        
        <div class="row">
          <div class="col s7 push-s5">
            
          <img  alt="no records" src="img/dog-bro.png" style="width:500px; height:500px;">
    
          </div>
          <div class="col s5 pull-s7">
    
    
          <div class="container">
              <br><br>
              <h2 class="center orange-text">There has been an error????<h2>
              <br><br>
            </div>
             </div>
         
        </div>
    
        
        
        
        
        ';
        }
    

      }

$db->close();

}
?>