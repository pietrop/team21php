<?php
	include "../navbar/navbar.php";
	include "groupReportAssessment.php";
	
	//Retrieving assessor and assessee values
	$assessor = $_POST['assessor'];
	$assessee = $_POST['assessee'];
	
	$query = "SELECT reports.reportID  FROM reports WHERE reports.group_ID =". $assessee;	
	$result = $conn->query($query);
	//While loop is required to ensure that only the latest report is assessed
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$reportID = $row['reportID'];
	}
	//Creating groupreportassessment object
	$assessment = new GroupReportAssessment($assessor, $reportID);
	//Inserting to the database
	if (($query = $assessment->createInsertQuery()) != null){
		$result = $conn->query($query);
	}
	include "../navbar/footer.php";
?>
<script>
	location.href="showAssessments.php";
</script>