;<?php
include "assesment.php";

$assesment = new assesment($_POST['assesmentID'], $_POST['criteria'], $_POST['mark'], $_POST['comment']);

$criteria = $assesment->getCriteria();
$mark = $assesment->getMark();
$comment = $assesment->getComment();

echo "<p>$criteria</p>";
echo "<p>$mark</p>";
echo "<p>$comment</p>";


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

echo "flag1";

//$query = 'INSERT INTO admins(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
if (($query = $assesment->createInsertQuery()) != null){
	$result = $conn->query($query);
	echo "flag2";
	//$row = mysql_fetch_array($result);
	//print_r($row);
}else {
	echo "<p>an error in the connection accoured</p>";
	echo "flag3";
}

echo "flag4";
?>