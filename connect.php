<?php
$username=$_POST['username'];
$submit=$_POST['submit'];
$login=$_POST['login'];
$email=$_POST['email'];
$password=$_POST['password'];
$servername = 'localhost';
$user ='root';
$pass = '';
$db = 'sql_project';
    if(isset($submit)){
        $conn = new mysqli('localhost',$user, $pass, $db );
        if($conn-> connect_error){
            die('connection Failed : '.$conn->connect_error);
        }
        else{
            $stmt =$conn-> prepare("Insert into user(username, email, password) values(?,?,?)");
            $stmt->bind_param("sss", $username, $email, $password);
            $stmt->execute();
            header("Location: http://localhost/sql_project/SqlProject/login.php");
            $stmt->close();
            $conn->close();
        }
    }

 
?>
