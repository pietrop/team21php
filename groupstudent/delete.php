<?php
	include "../dbConnect.php";
	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
	
	$email = mysqli_real_escape_string($conn, $_GET['email']);
	//When student is deleted. He also needs to be deleted from the groups table
	$conn->query('DELETE FROM students WHERE email="'.$email.'"');
	$conn->query('DELETE FROM groups WHERE student_ID="'.$email.'"');
?>
<script>
	location.href="index.php";
</script>