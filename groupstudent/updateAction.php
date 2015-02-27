<?php
include "../dbConnect.php";

//RECEIVING FIELDS FROM update.php
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$group = $_POST['group'];
$prevEmail = $_POST['prevEmail'];
$prevGroup = $_POST['prevGroup'];

//****DATABASE CONNECTION
$conn = connectToDb();
$conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****

$conn->query('UPDATE `students` SET `email`="'.$email.'",`firstName`="'.$firstName.'",`lastName`="'.$lastName.'" WHERE `email`="'.$prevEmail.'"');

$deleteQuery = "DELETE FROM `team21`.`groups` WHERE `groups`.`groupID` = ".$prevGroup." AND `groups`.`student_ID` = '".$prevEmail."'";
$conn->query($deleteQuery);
$addQuery = "INSERT INTO `groups`(`groupID`, `student_ID`) VALUES (".$group.",\"".$email."\")";
$conn->query($addQuery);

header("Location: index.php");

?>