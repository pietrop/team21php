<?php
include "admin.php";

$admin = new admin($_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['password']);

$email = $admin->getEmail();
echo $email;

//Database related information
$hostname="127.0.0.1";
$user="root";
$password="root";

$conn = new mysqli($hostname,$user,$password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connection successful<br>";
}

$myDB = $conn->select_db("team21");

//$query = 'INSERT INTO admins(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
if (($query = $admin->createInsertQuery()) != null){
	$result = $conn->query($query);
	//$row = mysql_fetch_array($result);
	//print_r($row);
}
?>