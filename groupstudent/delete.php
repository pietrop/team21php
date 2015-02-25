<?php
	$email = $_GET['email'];

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

	$conn->query('DELETE FROM students WHERE email="'.$email.'"');
	$conn->query('DELETE FROM groups WHERE student_ID="'.$email.'"');

	header("Location: index.php");

?>