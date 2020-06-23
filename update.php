<?php
$servername = 'localhost';
$user ='root';
$pass = '';
$db = 'sql_project';
 $conn = new mysqli('localhost',$user, $pass, $db );
   
    session_start();
    echo "<h1>Hello ... You Made It !!!</h1>";
    $conn = new mysqli('localhost',$user, $pass, $db );
    $query = "SELECT * FROM `horse` ORDER BY `horse_id` ASC";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          
          echo "<br>";
          echo  $dbhorse_name=$row['horse_name'];
          echo "<br>";
          echo $dbhorse_name=$row['horse_id'];
          echo "<br>";
        }
    }


    $conn = mysqli_connect('localhost',$user, $pass);
     $db =mysqli_select_db($conn,'sql_project');
      if(isset($_POST['submit'])){
      
        $horse_id =$_POST['horse_id'];
      
        $query = "UPDATE `horse` SET horse_name='$_POST[hoursname]' Where horse_id='$_POST[horse_id]' ";
        $query_run = mysqli_query($conn,$query);
        if($query_run){
            echo '<script type"text/javascript"> alert("data updated")</script>';
        }else{
            echo '<script type"text/javascript"> alert("data not updated")</script>';
        }
      
      }

?>
<br>
<br>


     <form  method="POST">
    hours name: <input type="text" name="hoursname"><br />
    <br>
     hours id: <input type="text" name="horse_id"><br />
    <input type="submit" value="change hours name" name="submit" />
     </form>