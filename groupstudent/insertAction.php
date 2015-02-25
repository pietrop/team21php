<?php
include "student.php";
//RECEIVING FIELDS FROM update.php
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$group = $_POST['group'];

//****DATABASE CONNECTION
$hostname="127.0.0.1";
$user="root";
$password="root";

$conn = new mysqli($hostname,$user,$password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connection successful<br>";
}
$myDB = $conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****

$newStudent = new Student($email, $firstName, $lastName, null);

$conn->query($newStudent->createInsertQuery());

$addQuery = "INSERT INTO `groups`(`groupID`, `student_ID`) VALUES (".$group.",\"".$email."\")";
$conn->query($addQuery);

header("Location: index.php");

?>