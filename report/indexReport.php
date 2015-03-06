<html>
<head>
	<meta charset = "UTF-8">
</head>
<body>
<header>
	<h1>Database Project: Reports</h1>
</header>
<main>
	<!--LIST OF STUDENTS FROM DATABASE-->
<table>
	<tr>
		<td><b> Report ID</b></td>
		<td><b> Group ID</b></td>
		<td><b> Abstract </b></td>
		<td><b> Review 1 </b></td>
		<td><b> Review 2 </b></td>	
	</tr>
<!--RETRIEVEING REPORT LIST FROM DATABASE-->

<?php
include "report.php";

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

//Retrieving students from DB and storing in an Array
	$showResult = $conn->query("Select * FROM reports");
	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		$newReport = new Report($row['reportID'], $row['group_ID'], $row['abstract'], $row['review1'],$row['review2']);
		$reportsArray[] = $newReport;
	}
	//DETERMINING STUDENT's GORUP STATUS
	// $whichGroupQuery = "SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID";
	// $showResult = $conn->query($whichGroupQuery);
	// while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
	// 	$groupsArray[] = $row;
	// }
	// ADDING TO HTML TABLE

	foreach($reportsArray as $rep){
		$groupID = null;
		foreach($reportsArray as $group){
			if ($report['report']==$rep->getReportID()){
				$groupID = $group['groupID'];
				echo "1";
			}
		}
		echo "<tr>";
		echo "<td>".$rep->getReportID()."</td>";
		echo "<td>".$rep->getGroup_ID()."</td>";
		echo "<td>".$rep->getAbstract()."</td>";
		echo "<td>".$rep->getReview1()."</td>";
		echo "<td>".$rep->getReview2()."</td>";
		// echo '<td><a href="update.php?email='.$rep->getEmail().'&firstName='.$rep->getFirstName().'&lastName='.$rep->getLastName().'&group='.$groupID.'"> Update </a>&nbsp; &nbsp; <a href="delete.php?email='.$stud->getEmail().'"> Delete </a>';
		echo "</tr>";
	}
?>

</table>
<br>
<br>
<a href="insert.php"> Add new Report </a>

</main>


</body>


</html>