<?php
require_once("connect.php");
    session_start();
    echo "<h1>Hello ... You Made It !!!</h1>";
    $conn = new mysqli('localhost',$user, $pass, $db );
    $query = "SELECT h.horse_name,h.horse_breed, h.horse_color, h.skill, h.horse_age, u.username from user_horse uh 
    JOIN horse h on h.horse_id =uh.horse_id join user u on uh.user_id = u.user_id 
    where u.user_id ='".$_SESSION ['user_id']."'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo  $dbusername=$row['username'] ; 
          echo "<br>"; 
          echo  $dbhorse_name=$row['horse_name'];
          echo "<br>";  
          echo  $dbhorse_breed=$row['horse_breed'];
          echo "<br>"; 
          echo  $dbhorse_name=$row['skill'];
          echo "<br>"; 
          echo  $dbhorse_name=$row['horse_age'];
          echo "<br>"; 
          echo  $dbhorse_name=$row['horse_color'];
          echo "<br> <br>";  
        }
    }
?>

