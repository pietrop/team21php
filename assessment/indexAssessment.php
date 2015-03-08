<?php
 include "../navbar/navbar.php";
?>

     
<main>
	<!--LIST OF STUDENTS FROM DATABASE-->
	
<table class="table table-striped table-hover " >
	 <thead>
	<tr>
		<td><b> Assessment ID</b></td>

		<td><b> Criteria </b></td>
		<td><b> Mark  </b></td>
		<td><b> Comment  </b></td>	
	</tr>
	 </thead>
	 <tbody>
<!--RETRIEVEING REPORT LIST FROM DATABASE-->

<?php
include "assessment.php";
// $conn = new mysqli($hostname,$user,$password);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
// 	echo "DB Connection successful<br>";
// }
 //****DATABASE CONNECTION
$conn = connectToDb();
$conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****
//Retrieving students from DB and storing in an Array
$query = "SELECT * FROM assessments";
$showResult = $conn->query($query);
while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
	$newAssessment = new Assessment($row['assessmentID'], $row['criteria'], $row['mark'],$row['comment']);
	$assessmentsArray[] = $newAssessment;

}
//DETERMINING STUDENT's GORUP STATUS
// $whichGroupQuery = "SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID";
// $showResult = $conn->query($whichGroupQuery);
// while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
// 	$groupsArray[] = $row;
// }
// ADDING TO HTML TABLE


foreach($assessmentsArray as $rep){
	
	echo "<tr>";
	echo "<td>".$rep->getAssessmentID()."</td>";
	echo "<td>".$rep->getCriteria()."</td>";
	echo "<td>".$rep->getMark()."</td>";
	echo "<td>".$rep->getComment()."</td>";
	// echo '<td><a href="update.php?email='.$rep->getEmail().'&firstName='.$rep->getFirstName().'&lastName='.$rep->getLastName().'&group='.$groupID.'"> Update </a>&nbsp; &nbsp; <a href="delete.php?email='.$stud->getEmail().'"> Delete </a>';
	echo "</tr>";
}
?>
</tbody>
</table>
<br>
<br>
<a href="insert.php" class="btn btn-primary"> Add new Assesment </a>

<?php
 include "../navbar/footer.php";
?>
