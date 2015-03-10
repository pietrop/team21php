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
$uploadedReport = file_get_contents($_FILES['file']['tmp_name'], true);
 // echo $uploadedReport;
// echo "<hr>";
$sectionsArray = explode("\n\n", $uploadedReport);
 // echo print_r($sectionsArray);
echo "<hr>";
echo $sectionsArray[0]; //abstract
echo "<br>";
$abstractText = $sectionsArray[1];
echo $abstractText;
echo "<hr>";
echo $sectionsArray[2];//review 1
echo "<br>";
$review1Text = $sectionsArray[3];
echo $review1Text;
echo "<hr>";
echo $sectionsArray[4]; // review 2
echo "<br>";
$review2Text =  $sectionsArray[5];
echo $review2Text;
echo "<hr>";
echo "<hr><hr>";

$report = new report( $_SESSION['group'], $abstractText, $review1Text, $review1Text);
    	$query = $report->createInsertQuery();
      	$conn->query($query);
?>


<!-- http://www.tutorialspoint.com/php/php_file_uploading.htm 
http://stackoverflow.com/questions/5299471/php-parsing-a-txt-file-->

			<script>
		       location.href = "../report/indexReport.php";
	     </script>