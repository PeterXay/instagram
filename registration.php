<?php

require('db.php');
session_start();

$userlog = $_SESSION['user'];

if($userlog > 0){
	 header("Location: http://45.55.3.245"); /* Redirect browser */
 	exit();
}

else{

	if(empty($_POST)){
	 echo "";
	}

	else if (!empty($_POST) && $_POST['email'] != "" && $_POST['password'] != ""){

 	$email = $_POST['email'];
 	$password = $_POST['password'];

 	$query = "INSERT INTO Users (username, password, date) VALUES ('$email', '$password', now())";
 
 	if (mysqli_query($connect, $query)) {
  		echo "<b>$email</b> has been created successfully";
		header( 'refresh:3;url=http://45.55.3.245');
 	} 
 
 	else {
  		echo "Error: " . $query . "<br>" . mysqli_error($connect);
 	}

 	mysqli_close($conn);
	}
}

if($_POST['Submit'])
{
	if ($_POST['email'] == "" && $_POST['password'] != ""){
	 	echo "Email field is blank <br>";
	}

	else if ($_POST['password'] == "" && $_POST['email'] != ""){
 		echo "Password field is blank <br>";
	}

	else if ($_POST['email'] == "" && $_POST['password'] == ""){
 		echo "Email and Password field are blank <br>";
	}
}
?>

<form id='login' action='registration.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Creating New User</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='email' >Email:</label>
<input type='text' name='email' id='email'  maxlength="50" />
 
<label for='password' >Password:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>
</form>

