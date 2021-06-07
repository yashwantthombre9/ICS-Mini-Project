<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
	<style type="text/css">
		body{
			text-align: center;
			font-size: 50px;
			color: white;
			padding: 100px;
		}
	</style>
</head>
<body bgcolor="green">

<?php

$username = $_POST['username'];
$password = $_POST['password'];


$host  = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attack";

$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
	
function insertData(){
global $conn,$username,$password;
$sql = "insert into login_data values('$username','$password');";
$result = mysqli_query($conn,$sql);
if($result)
	echo '<div class="alert alert-success text-success" role="alert">
  		 Successfully Registered! <a href="#" 
  		 class="alert-link"></a>...
		  </div>';
else
	echo '<div class="alert alert-danger text-danger" role="alert">
  		 We are Unable to Register!...<a href="#" 
  		 class="alert-link"></a>
		  </div>';	
}

function fetchData(){
	global $conn,$username,$password;
	$sql = "select * from login_data where email='$username' and password='$password'";
	$result = mysqli_query($conn,$sql);
	if($result->num_rows > 0)
	{
		echo '<div class="alert alert-success text-success" role="alert">
  		 Successfully Logged In... <a href="#" 
  		 class="alert-link"></a>.
		  </div>';
	} 
	else
		echo '<div class="alert alert-success text-danger" role="alert">
  		 Invalid Credentials...Please try again! <a href="#" 
  		 class="alert-link"></a>.
		  </div>';
}

if(isset($_POST['login']))
fetchData();
else
insertData();



?>


</body>
</html>
