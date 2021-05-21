<?php

function getQuickResults(){

    $db = mysqli_connect("localhost", "root", "", "petadopt");

    if ($db->connect_error){
        die("Connection Failed: " . $db->connect_error);
    }


    $animal = $_POST['animal'];
    $zip = $_POST['zip'];

    $query = "SELECT p.id, p.name, p.age, p.color, p.neutered, s.shelter_name, s.website
              FROM pets as p INNER JOIN shelter as s
              ON p.shelter_id = s.shelter_id
              WHERE s.zip_code = '$zip' AND p.breed = '$animal' ;";

    $results = mysqli_query($db, $query);

    if(mysqli_num_rows($results) > 0){
        while ($row = mysqli_fetch_array($results)){
            echo '
           
            <div class="col s4">
            <div class="card medium">
              <div class="card-image">
                <img alt="'. $row['name'] .'" src="img/'. $row['id'].'.jpg">
                <span class="card-title" style="text-shadow: 3px 1px #987654;">'.$row['name'].'</span>
              </div>
              <div class="card-content">
                <p>PetID: '.$row['id'].'</p> 
                <p>Color: '.$row['color'].'  &nbsp;&nbsp;  Age: '.$row['age'].'</p>
                <p>Nuetered/Spayed: '.$row['neutered'].'</p>
                <p>Shelter: '.$row['shelter_name'].'</p>
              </div>
              <div class="card-action">
              <a class="orange-text" href="'.$row['website'].'">Shelter Link</a>
            </div>
            </div>
          </div>
            
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
          <h2 class="center orange-text">Sorry, there are no records for that!<h2>
          <br><br>
        </div>
         </div>
     
    </div>

    
    
    
    
    ';
    }
$db->close();

}
?>