<?php
require_once("connect.php");
    session_start();
    $conn = new mysqli('localhost',$user, $pass, $db );
    $query = "SELECT h.horse_name,h.horse_breed, u.username from user_horse uh 
    JOIN horse h on h.horse_id =uh.horse_id join user u on uh.user_id = u.user_id 
    where u.user_id ='".$_SESSION ['user_id']."'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo  $dbusername=$row['username'];  
          echo  $dbhorse_name=$row['horse_name']; 
          echo  $dbhorse_breed=$row['horse_breed'];  
        }
        
    }
?>

<p>Hello ... You Made It !![]</p>