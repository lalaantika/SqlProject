<?php
$servername = 'localhost';
$user ='root';
$pass = '';
$db = 'sql_project';
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $conn = new mysqli('localhost',$user, $pass, $db );
        if($conn-> connect_error){
            die('connection Failed : '.$conn->connect_error);
        }
        else{
            $stmt =$conn-> prepare("Insert into user(username, email, password) values(?,?,?)");
            $stmt->bind_param("sss", $username, $email, $password);
            $stmt->execute();
            header("Location: login.php");
            $stmt->close();
            $conn->close();
        }
    }
    if(isset($_POST['login'])){
        header("Location: main.php");
    }
?>
