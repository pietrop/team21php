<?php
//RECEIVING FIELDS FROM update.php
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$group = $_POST['group'];
$prevEmail = $_POST['prevEmail'];
$prevGroup = $_POST['prevGroup'];

echo $email;
echo $firstName;
echo $lastName;
echo $group;

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

$conn->query('UPDATE `students` SET `email`="'.$email.'",`firstName`="'.$firstName.'",`lastName`="'.$lastName.'" WHERE `email`="'.$prevEmail.'"');

$deleteQuery = "DELETE FROM `team21`.`groups` WHERE `groups`.`groupID` = ".$prevGroup." AND `groups`.`student_ID` = '".$prevEmail."'";
$conn->query($deleteQuery);
$addQuery = "INSERT INTO `groups`(`groupID`, `student_ID`) VALUES (".$group.",\"".$email."\")";
$conn->query($addQuery);

header("Location: index.php");

?>