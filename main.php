<?php require_once("connect.php"); 

$conn = new mysqli('localhost',$user, $pass, $db );
$sql = "SELECT horse_id, horse_breed, horse_name FROM horse";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "horse_id: " . $row["horse_id"]. " - horse_breed: " . $row["horse_breed"]. "horse_name: " . $row["horse_name"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();


?>
 

<p>Hello ... You Made It !!!</p>