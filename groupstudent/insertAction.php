<?php
include "student.php";
include "../dbConnect.php";

//RECEIVING FIELDS FROM update.php
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$email = $_POST['email'];
	echo "Valid email";
} else {
	echo "Invalid email";
	header("Location: insert.php?invalid=1");	
}
$firstName = filter_var($_POST['firstName'],FILTER_SANITIZE_STRING);
$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
$password = $_POST['password'];
$group = $_POST['group'];

//****DATABASE CONNECTION
$conn = connectToDb();
$conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****

$newStudent = new Student($email, $firstName, $lastName, $password);

$conn->query($newStudent->createInsertQuery());

$addQuery = "INSERT INTO `groups`(`groupID`, `student_ID`) VALUES (".$group.",\"".$email."\")";
$conn->query($addQuery);

header("Location: index.php");

?>