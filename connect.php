<?php
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$servername = 'localhost';
$user ='root';
$pass = '';
$db = 'sql_project';
$conn = new mysqli('localhost',$user, $pass, $db );
    if($conn-> connect_error){
        die('connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt =$conn-> prepare("Insert into user(username, email, password) values(?,?,?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        echo "data uploded";
        $stmt->close();
        $conn->close();
    }
?>
