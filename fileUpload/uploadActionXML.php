<?php
include "../navbar/navbar.php";
include "../report/report.php";

if( $_FILES['file']['name'] != "" )
{
   // copy( $_FILES['file']['name'], "/" ) or 
   //         die( "Could not copy file!");
}
else
{
    die("No file specified!");
}
?>
<html>
<head>
<title>Uploading Complete</title>
</head>
<body>
<h2>Uploaded File Info:</h2>
<ul>
<li>Sent file: <?php echo $_FILES['file']['name'];  ?>
<li>File size: <?php echo $_FILES['file']['size'];  ?> bytes
<li>File type: <?php echo $_FILES['file']['type'];  ?>
<li>File : <?php echo print_r($_FILES['file']);  ?>
<h2>Inside the File:</h2>


<?php 
	$xmlFile=file_get_contents($_FILES['file']['tmp_name']);
	$xml=simplexml_load_string($xmlFile) or die("Error: Cannot create object");
	print_r($xml);
	echo "<hr>";
	print_r($xml->abstract);
	
	echo "<hr>Abstrat<br>";
	$abstractXML=  strip_tags($xml->abstract->asXML());
	echo $abstractXML;
	
	echo "<hr>Review1<br>";
	$review1XML=  strip_tags($xml->review1->asXML());
	echo $review1XML;
	
	echo "<hr>Review2<br>";
	$review2XML=  strip_tags($xml->review2->asXML());
	echo $review2XML;
	
	$report = new Report( $_SESSION['group'], $abstractXML, $review1XML, $review2XML);
	$query = $report->createInsertQuery();
	$conn->query($query);
	echo "<hr>";     	
	print_r($report);
?>

<!-- http://www.tutorialspoint.com/php/php_file_uploading.htm 
http://stackoverflow.com/questions/5299471/php-parsing-a-txt-file-->

<script>
	location.href = "../report/indexMyReport.php";
</script>