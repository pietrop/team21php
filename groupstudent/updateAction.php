<?php
	include "../dbConnect.php";
	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
	
	
	//RECEIVING FIELDS FROM update.php
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$group = $_POST['group'];
	$prevEmail = $_POST['prevEmail'];
	$prevGroup = $_POST['prevGroup'];
	
	$conn->query('UPDATE `students` SET `email`="'.$email.'",`firstName`="'.$firstName.'",`lastName`="'.$lastName.'" WHERE `email`="'.$prevEmail.'"');
	$deleteQuery = "DELETE FROM `team21`.`groups` WHERE `groups`.`groupID` = ".$prevGroup." AND `groups`.`student_ID` = '".$prevEmail."'";
	$conn->query($deleteQuery);
	$addQuery = "INSERT INTO `groups`(`groupID`, `student_ID`) VALUES (".$group.",\"".$email."\")";
	$conn->query($addQuery);
	
?>
<script>
	location.href="index.php";
</script>