<?php
include "report.php";

$report = new report($_POST['reportID'], $_POST['group_ID'], $_POST['abstract'], $_POST['review1'], $_POST['review2']);

$abstract = $report->getAbstract();
echo $abstract;

//Database related information
$hostname="127.0.0.1";
$user="root";
$password="root";

$conn = new mysqli($hostname,$user,$password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connection successful<br>";
}

$myDB = $conn->select_db("team21");

//$query = 'INSERT INTO admins(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
if (($query = $report->createInsertQuery()) != null){
	$result = $conn->query($query);
	//$row = mysql_fetch_array($result);
	//print_r($row);
}
?>