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
            $l_user_id = mysqli_insert_id($conn);
            
            $query2 =$conn-> prepare("Insert into horse(horse_name, horse_breed, horse_color, horse_age, skill) values(?,?,?,?,?)");
            $query2 ->bind_param("sssis", $horse_name, $horse_breed, $horse_color, $horse_age, $horse_skill);
            $l_horse_id = mysqli_insert_id($conn);
            
            $query1 ->execute();
            $query1 ->close();
            $query2 ->execute();
            $query2 ->close();
       
            $conn->close();
            header("Location: login.php");
        }
    }
    if(isset($_POST['login'])){
        header("Location: main.php");
    }
?>
