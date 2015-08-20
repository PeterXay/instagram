<?php

session_start();

require('db.php');

$test = $_POST['username'];
$test2 = $_POST['password'];

$tempuser = $_SESSION['user'];

//echo "$tempuser --";

if($tempuser > 0){
	echo "You are already logged in";
	echo "<br><a href='logout.php'>Logout</a>";
}

else{
	echo "<div id='main'>";
	echo "<h1>Please Log in: </h1>";
	echo "<div id='login'>";
	echo "<form action='' method='post'>";
	echo "<label>UserName: </label>";
	echo "<input id='name' name='username' placeholder='username' type='text'>";
	echo "<label>Password: </label>";
	echo "<input id='password' name='password' placeholder='**********' type='password'>";
	echo "<input name='submit' type='submit' value=' Login '>";

	$sql = "SELECT id,username FROM Users WHERE username = '$test' and password = '$test2'";
	$result = mysqli_query($connect,$sql);
	$row = mysqli_fetch_row($result);
	
	$userid = $row[0];
	$_SESSION['user'] = $userid;

	$tempuser = $_SESSION['user'];


	echo "<br>";

	echo "<br><a href=http://45.55.3.245/registration.php><img src='http://thecopticleague.org/uploads/files/2/d05fae7c82-registration.jpg' width='150' height='50'  /></a>";
	
	if($_POST['submit']){
		echo "<meta http-equiv='refresh' content='1;index.phtml' />";
	}
}

?>
