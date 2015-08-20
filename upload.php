<?php

require('db.php');

echo "<form enctype='multipart/form-data' action='' method='POST'>";
echo "<input type='hidden' name='MAX_FILE_SIZE' value='10000000' />";
echo "Choose a file to upload:<br>"; 
echo "<input name='uploadedfile' type='file' /><br />";
echo "<input id='price' name='price' placeholder='Enter your price' type='text' />";
echo "<input id='message' name='message' placeholder='Enter your message' type='text' />";
echo "<br><input type='submit' value='Upload File' name='submit' /><br>";
echo "</form>";

$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if($_POST['submit']){

	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";
	
	}

	else{
    		echo "There was an error uploading the file, please try again!";
	}
}

$price = $_POST['price'];
$message = $_POST['message'];
$filename = $_FILES['uploadedfile']['name'];

$query = "INSERT INTO Images (message, filename, price, date) VALUES ('$message', '$filename', '$price', now())";

if($_POST['submit'])
{
	if (mysqli_query($connect, $query)) {
		echo "<br>Your message : <b>$message</b> has been created successfully<br>";
		echo "<br>Please wait 3 seconds to be redirect back to your home screen";
 		echo "<meta http-equiv='refresh' content='3;index.phtml' />";
	}
}
?>
