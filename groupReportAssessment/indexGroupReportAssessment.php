<?php
include "groupReportAssessment.php";
include "../dbConnect.php";

// echo "test";
session_start();

// store session data
if (isset($_SESSION['id']))
	$_SESSION['username'] = $_SESSION['username']; // or if you have any algo.

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peer Review System - Add assessment</title>

    <!-- Bootstrap -->
    <link href="../bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

      <div class="row">
    <h1>Welcome to Team 21 Peer Review System</h1>
    <h2> 
      <?php
        echo 'You are logged in as '.$_SESSION['email'];
        ?>.
    </h2>
    </div> <!-- row -->
  </div>
</body>
</html>








<?php

if(isset($_POST['report'])){

	$reportID = $_POST['report'];
	// echo "test2";
	// echo $_POST['report'];


	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

	$query = "SELECT groups.groupID  FROM groups WHERE groups.student_ID = '%s'",mysql_real_escape_string($_SESSION['email']);	
	$result = $conn->query($query);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $groupID = $row['groupID'];
	$assessment = new GroupReportAssessment($groupID, $reportID);

	echo $groupID," is reviewing ",$reportID;
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