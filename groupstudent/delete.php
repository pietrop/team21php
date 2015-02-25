<?php
	include "../dbConnect.php";
	$email = $_GET['email'];

	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

	$conn->query('DELETE FROM students WHERE email="'.$email.'"');
	$conn->query('DELETE FROM groups WHERE student_ID="'.$email.'"');

	header("Location: index.php");

?>