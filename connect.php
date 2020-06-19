<?php
$servername = 'localhost';
$user ='root';
$pass = '';
$db = 'sql_project';
$submit=$_POST['submit'];
$login=$_POST['login'];
    if(isset($submit)){
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
    if(isset($login)){
           if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
        $userlog=$_POST['userlog'];  
        $passlog=$_POST['passlog'];  
        $conn = new mysqli('localhost',$user, $pass, $db )or die(mysqli_error());

        $query=$conn ("SELECT * FROM login WHERE username='".$userlog."' AND password='".$passlog."'");  
        $numrows=mysqli_num_rows($query);  
        if($numrows!=0)  
        {  
        while($row=mysql_fetch_assoc($query))  
        {  
        $dbusername=$row['username'];  
        $dbpassword=$row['password'];  
        }  

        if($userlog == $dbusername && $passlog == $dbpassword)  
        {  
        session_start();  
        $_SESSION['sess_user']=$userlog;  

        header("Location: horse.php");  
        }  
        } else {  
        echo "Invalid username or password!";  
        }  

        } else {  
        echo "All fields are required!";  
        }  
 }
 
?>
