<?php
$username=$_POST['username'];
//$email=$_POST['email'];
$password=$_POST['password'];
$servername = 'localhost';
$found = false;
$wrong_password = false;
$user ='root';
$pass = '';
$db = 'sqlassignment';
$conn = new mysqli('localhost',$user, $pass, $db );
    if($conn-> connect_error){
        die('connection Failed : '.$conn->connect_error);
    }
    else{
        /*$stmt =$conn-> prepare("Insert into user(username, email, password) values(?,?,?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        header("Location: http://localhost/sql_project/SqlProject/login.php");
        $stmt->close();
        $conn->close();*/
		$sql = "SELECT username, password, email FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  if ($row["username"]== $username) {
		  $found=true;
		  if ($row["password"]!=$password){
			  $wrong_password=true;
		  }
	  }
		  
	}
	if ($found==true) {
	echo "Found user " . $username . " in the database. <br/>";
		if ($wrong_password){ 
			echo "wrong password entered <br>";
		} else {
			echo "right password entered.<br>";
		}
		  
	} else {
			echo "no user with name " . $username . " found in database. <br/>";
    echo "<br>";
	//echo "username: " . $row["username"]. " - password: " . $row["password"]. " - email: " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
    }
?>
