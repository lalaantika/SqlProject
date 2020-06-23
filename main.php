<?php
require_once("connect.php");
    session_start();
    echo "<h1>Hello ... You Made It !!!</h1>";
    $conn = new mysqli('localhost',$user, $pass, $db );
    $query = "SELECT h.horse_id, h.horse_name,h.horse_breed, h.horse_color, h.skill, h.horse_age, u.username from user_horse uh 
    JOIN horse h on h.horse_id =uh.horse_id join user u on uh.user_id = u.user_id 
    where u.user_id ='".$_SESSION ['user_id']."'";
    $result = $conn->query($query);
    echo "Horse list";
    echo "<table>
        <tr>
        <th>Username</th>
        <th>Horsename</th>
        <th>Horse Breed</th>
        <th>Skill</th>
        <th>Horse Age</th>
        <th>Horse Color</th>
        <th>Horse ID</th>
        <th>Action</th>
        </tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo  "tr";
          echo   "<td>" .$dbusername=$row['username']."</td>"; 
          echo   "<td>" .$dbhorse_name=$row['horse_name']. "</td>";
          echo   "<td>" .$dbhorse_breed=$row['horse_breed']. "</td>";
          echo   "<td>" .$dbhorse_name=$row['skill']. "</td>";
          echo   "<td>" .$dbhorse_name=$row['horse_age']. "</td>";
          echo   "<td>"  .$dbhorse_name=$row['horse_color']. "</td>";
          echo   "<td>" .$dbhorse_id=$row['horse_id']."</td>"; 
          echo  "<td>".'<form action="" method ="POST"><input type ="hidden" name="horse_id" value='. $dbhorse_id.'>
          <input type="submit" name= "Retire" value ="Retire"></form>'. "</td>";
          echo "</tr>";
        }
    }
    if(isset($_POST['Retire'])){
    $query2 = "DELETE FROM horse where horse_id ='".$_POST['horse_id']."'";
      if (mysqli_query($conn, $query2)){
       echo "Record Deleted";
      }
      else {
       echo "Error Unable to Delete Record";
      }
    }
?>

