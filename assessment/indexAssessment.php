<?php
 include "../navbar/navbar.php";
?>

     
<main>
	
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

<?php
	include "assessment.php";
	//Retrieving students from DB and storing in an Array
	$query = "SELECT * FROM assessments";
	$showResult = $conn->query($query);
	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		$newAssessment = new Assessment($row['assessmentID'], $row['criteria'], $row['mark'],$row['comment']);
		$assessmentsArray[] = $newAssessment;
	}
	
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
