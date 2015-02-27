<?php
include "groupReportAssessment.php";
include "../dbConnect.php";

// echo "test";

if(isset($_POST['group']) && isset($_POST['report'])){

	$groupID = $_POST['group'];
	$reportID = $_POST['report'];
	// echo "test2";
	echo $_POST['group'];
	$assessment = new GroupReportAssessment($groupID, $reportID);


	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****


	// //Database related information
	// $hostname="127.0.0.1";
	// $user="root";
	// $password="root";

	// $conn = new mysqli($hostname,$user,$password);
	// // Check connection
	// if ($conn->connect_error) {
	//     die("Connection failed: " . $conn->connect_error);
	// } else {
	// 	echo "Connection successful<br>";
	// }

	// $myDB = $conn->select_db("team21");

	//$query = 'INSERT INTO groupreportassessment(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
	if (($query = $assessment->createInsertQuery()) != null){
		$result = $conn->query($query);
		//$row = mysql_fetch_array($result);
		//print_r($row);
	}

}else{
	//you handle the exception
	echo "test3";
}


?>