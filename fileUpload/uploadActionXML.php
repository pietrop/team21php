<?php
	include "../navbar/navbar.php";
	include "../report/report.php";
	
	if( $_FILES['file']['name'] == "" ){
	   die("No file specified!");
	}
	$xmlFile=file_get_contents($_FILES['file']['tmp_name']); //Loading file
	$xml=simplexml_load_string($xmlFile) or die("Error: Cannot create object"); //Parsing xml gile
	
	$abstractXML=  strip_tags($xml->abstract->asXML());
	$review1XML=  strip_tags($xml->review1->asXML());
	$review2XML=  strip_tags($xml->review2->asXML());

	$report = new Report( $_SESSION['group'], $abstractXML, $review1XML, $review2XML); //Storing into Reports object
	
	$query = $report->createInsertQuery();
	$conn->query($query); //updating database
?>

<script>
	location.href = "../report/indexMyReport.php";
</script>