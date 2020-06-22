<?php
$servername = 'localhost';
$user ='root';
$pass = '';
$db = 'sql_project';
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $horse_name= 'Watermelon';
        $array_horse_breed=array('Akhal-Teke','Quarter Horse','Arabian','Connemara', 'Thoroughbred', 'Pony', 'Mustang');
        $horse_breed_index=array_rand( $array_horse_breed);
        $horse_breed = $array_horse_breed[$horse_breed_index];
        
        $array_horse_color=array('Chestnut', 'Dark Bay', 'Cherry Bay', 'Dark Chestnut','Bay', 'Grey','Black');
        $horse_color_index=array_rand( $array_horse_color);
        $horse_color = $array_horse_color[$horse_color_index];
    
        
        $array_horse_skill=array('Stamina', 'Gallop', 'Speed', 'Jumping');
        $horse_skill_index=array_rand( $array_horse_skill);
        $horse_skill = $array_horse_skill[$horse_skill_index];
        
        $horse_age = '1';
        
        $conn = new mysqli('localhost',$user, $pass, $db );
        if($conn-> connect_error){
            die('connection Failed : '.$conn->connect_error);
        }
        else{
            $query1 =$conn-> prepare("Insert into user(username, email, password) values(?,?,?)");
            $query1 ->bind_param("sss", $username, $email, $password);
            $query1 ->execute();
            $query1 ->close();
            $l_user_id =$conn-> insert_id;
            $user_id=$l_user_id;
           
            $query2 =$conn-> prepare("Insert into horse(horse_name, horse_breed, horse_color, horse_age, skill) values(?,?,?,?,?)");
            $query2 ->bind_param("sssis", $horse_name, $horse_breed, $horse_color, $horse_age, $horse_skill);
            $query2 ->execute();
            $query2 ->close();
            $l_horse_id =$conn-> insert_id;
            $horse_id=$l_horse_id;
           
            $query3 =$conn-> prepare("Insert into user_horse(horse_id, user_id) values(?,?)");
            $query3 ->bind_param("ii", $horse_id, $user_id);
            
            $query3 ->execute();
            $query3 ->close();
            
            $conn->close();
            header("Location: login.php");
        }
    }

    if(isset($_POST['login'])){
        $loginuser=$_POST['loginuser'];
        $loginpass=$_POST['loginpass'];
        $conn = new mysqli('localhost',$user, $pass, $db );
        if($conn-> connect_error){
            die('connection Failed : '.$conn->connect_error);
        }
        $query = "SELECT * from user where username='".$loginuser."'AND password='".$loginpass."'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
          }
             header("Location: main.php");
        } else {
          echo "0 results";
        } 
   
        $conn->close();
    }
?>
