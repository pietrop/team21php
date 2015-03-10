<?php
include "../navbar/navbar.php";
include "groupReportAssessment.php";
echo "test";
print_r($_POST);
?>
  <h1>You have assigned a peer assessment</h1>


<?php
// if(isset($_POST['assessor'])){
  $assessor = $_POST['assessor'];
	$assessee = $_POST['assessee'];
	echo $assessee;
	echo $assessor;


	$query = "SELECT reports.reportID  FROM reports WHERE reports.group_ID =". $assessee;	
	$result = $conn->query($query);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $reportID = $row['groupID'];
	$assessment = new GroupReportAssessment($assessor, $reportID);

	echo "Group ".$assessor." is reviewing Group ".$assessee;
	//$query = 'INSERT INTO groupreportassessment(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
	if (($query = $assessment->createInsertQuery()) != null){
		$result = $conn->query($query);
		//$row = mysql_fetch_array($result);
		//print_r($row);
	}


// }
// else{
// 	//you handle the exception
// 	echo "Could not create an assessment. Please try again.";
// }

include "../navbar/footer.php";

?>