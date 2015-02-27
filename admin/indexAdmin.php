<?php
include "admin.php";
include "../dbConnect.php";

$admin = new admin($_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['password']);

$email = $admin->getEmail();
echo $email;

//****DATABASE CONNECTION
$conn = connectToDb();
$conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****


//$query = 'INSERT INTO admins(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
if (($query = $admin->createInsertQuery()) != null){
	$result = $conn->query($query);
	//$row = mysql_fetch_array($result);
	//print_r($row);
}
?>