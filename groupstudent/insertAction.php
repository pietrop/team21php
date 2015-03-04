<?php
include "student.php";
include "../dbConnect.php";

//RECEIVING FIELDS FROM update.php
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
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