<?php
	include "../dbConnect.php";
	#Making sure that email and password fields are filled
	if (isset($_POST['email']) and isset($_POST['password'])){
		$email = $_POST['email'];
		$password = md5($_POST['password']); //PHP hashing is used
	} else {
		$nextPageUrl = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		header("Location: ".$nextPageUrl."?invalid=1");
	}
	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
	
	$query = "SELECT * from students WHERE email='$email' and password='$password'";
	$result = $conn->query($query);
	if (mysqli_num_rows($result) == 1) {
		session_start();
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if (!isset($_SESSION['email'])){
			$_SESSION['email'] = $row['email'];	
			echo "Stored into Session ID ";
		} else {
			echo "Your email is ".$_SESSION['email']	;
		}
		$nextPageUrl = '../homePage/index.php';
		header("Location:". $nextPageUrl);
		//echo "You are signed in as ".$row['firstName']." ".$row['lastName'];	
	} else {
		echo "Invalid email or password";
		$nextPageUrl = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		header("Location: ".$nextPageUrl."?invalid=1");	
	}

?>