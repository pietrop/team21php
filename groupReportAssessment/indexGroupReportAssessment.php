<?php
include "../navbar/navbar.php";
include "groupReportAssessment.php";
echo "test";
?>
  <h1>You have assigned a peer assessment</h1>


<?php
// if(isset($_POST['assessor'])){
  $assessor = $_POST['assessor'];
	$assessee = $_POST['assessee'];

	$query = "SELECT reports.reportID  FROM reports WHERE reports.group_ID =". $assessee;	
	$result = $conn->query($query);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $reportID = $row['reportID'];
	$assessment = new GroupReportAssessment($assessor, $reportID);

	
	//$query = 'INSERT INTO groupreportassessment(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
	if (($query = $assessment->createInsertQuery()) != null){
		$result = $conn->query($query);
		//$row = mysql_fetch_array($result);
		//print_r($row);
    echo "Group ".$assessor." is reviewing Group ".$assessee;
	}


// }
// else{
// 	//you handle the exception
// 	echo "Could not create an assessment. Please try again.";
// }

include "../navbar/footer.php";

?>