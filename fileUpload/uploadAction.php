<?php
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

$sectionsArray = explode("\n\n", $uploadedReport);
// echo print_r($sectionsArray);
echo "<hr>";
echo $sectionsArray[0]; //abstract
echo "<br>";
$abstract = $sectionsArray[1];
echo $abstract;
echo "<hr>";
echo $sectionsArray[2];//review 1
echo "<br>";
$review1 = $sectionsArray[3];
echo $review1;
echo "<hr>";
echo $sectionsArray[4]; // review 2
echo "<br>";
$review2 =  $sectionsArray[5];
echo $review2;
echo "<hr>";
?>


<!-- http://www.tutorialspoint.com/php/php_file_uploading.htm 
http://stackoverflow.com/questions/5299471/php-parsing-a-txt-file-->


</ul>
</body>
</html>