<?php
include "groupReportAssessment.php";
include "../dbConnect.php";

// echo "test";
session_start();

// store session data
if (isset($_SESSION['id']))
	$_SESSION['username'] = $_SESSION['username']; // or if you have any algo.


echo 'You are logged in as '.$_SESSION['username'];

if(isset($_POST['report'])){

	$reportID = $_POST['report'];
	// echo "test2";
	echo $_POST['group'];
	$assessment = new GroupReportAssessment($groupID, $reportID);


	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

	$groupID = mysql_query( SELECT groups.groupID  FROM 'groups' WHERE groups.student_ID = $_SESSION['username']);
	echo $groupID;
	//$query = 'INSERT INTO groupreportassessment(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
	if (($query = $assessment->createInsertQuery()) != null){
		$result = $conn->query($query);
		//$row = mysql_fetch_array($result);
		//print_r($row);
	}

}else{
	//you handle the exception
	echo "Could not create an assessment. Please contact adminstrator.";
}


?>