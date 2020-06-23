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
    if ($result->num_rows > 0) {
      echo "<table border='1'>
      <tr>
      <th>Username</th>
      <th>Horsename</th>
      <th>Horse Breed</th>
      <th>Skill</th>
      <th>Horse Age</th>
      <th>Horse Color</th>
      <th>Horse ID</th>
      <th>Action</th>
      <th> Action</th>
      </tr>";
        while($row = $result->fetch_assoc()) {
          echo  "<tr>";
          echo   "<td>" .$dbusername=$row['username']."</td>"; 
          echo   "<td>" .$dbhorse_name=$row['horse_name']. "</td>";
          echo   "<td>" .$dbhorse_breed=$row['horse_breed']. "</td>";
          echo   "<td>" .$dbhorse_name=$row['skill']. "</td>";
          echo   "<td>" .$dbhorse_name=$row['horse_age']. "</td>";
          echo   "<td>"  .$dbhorse_name=$row['horse_color']. "</td>";
          echo   "<td>" .$dbhorse_id=$row['horse_id']."</td>"; 
          echo   "<td>" .'<form action="" method ="POST">
                        <input type="submit" name= "Retire" value ="Retire">
                        <input type ="hidden" name="horse_id" value= '. $dbhorse_id.'
                        </form>'. "</td>";
          echo    "<td>"  .'<form action="" method ="POST">
                          <input type ="hidden" name="horse_id" value='. $dbhorse_id.'
                          <input type ="text" name="horsename">
                          <input type="submit" name= "Update" value ="Update">
                          </form>'. "</td>";
          echo "</tr>";
        }
        echo "</table>";
      }
    if(isset($_POST['Retire'])){
    $query2 = "DELETE FROM horse where horse_id ='".$_POST['horse_id']."'";
      if (mysqli_query($conn, $query2)){
       echo "Record Deleted";
       header("Location: main.php");
      }
      else {
       echo "Error Unable to Delete Record";
      }
    }
    if(isset($_POST['Update'])){
      $query3 = "UPDATE horse SET horse_name = '".$_POST['horsename']."' WHERE horse_id ='".$_POST['horse_id']."'";
        if (mysqli_query($conn, $query3)){
         echo "Record Updated";
         header("Location: main.php");
        }
        else {
         echo "Error Unable to Update Delete Record";
        }
      }
?>

<style>

table
{
border-style:solid;
border-width:2px;
border-color:black;
}
td{
  margin:5px;
  padding:5px;
}
</style>