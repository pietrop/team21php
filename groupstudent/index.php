<?php
	include "../navbar/navbar.php";
	if (!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
?>
<main>
	<div class="container">
    	<div class="container">
			<h1>Database Project: Students</h1>
        </div>
	<!--LIST OF STUDENTS FROM DATABASE-->
		<table class="table">
			<tr>
				<td><b> E-mail </b></td>
				<td><b> First Name </b></td>
				<td><b> Last Name </b></td>
				<td><b> Group </b></td>
				<td><b> Actions </b></td>
			</tr>

	<!--RETRIEVEING STUDENT LIST FROM DATABASE-->
	<?php
		include "student.php";

		//Retrieving students from DB and storing in an Array
		$showResult = $conn->query("Select * FROM students");
		while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
			$newStudent = new Student($row['email'], $row['firstName'], $row['lastName'], $row['password']);
			$studentsArray[] = $newStudent;
		}
		//DETERMINING STUDENT's GORUP STATUS
		$whichGroupQuery = "SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID";
		$showResult = $conn->query($whichGroupQuery);
		while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
			$groupsArray[] = $row;
		}
		//ADDING TO HTML TABLE
		foreach($studentsArray as $stud){
			$groupID = null;
			foreach($groupsArray as $group){
				if ($group['email']==$stud->getEmail()){
					$groupID = $group['groupID'];
				}
			}
			if ($stud->getEmail() == $_SESSION['email']){
				echo '<tr class="info">';
			} else {
				echo "<tr>";
			}
			echo "<td>".$stud->getEmail()."</td>";
			echo "<td>".$stud->getFirstName()."</td>";
			echo "<td>".$stud->getLastName()."</td>";
			echo "<td>".$groupID."</td>";
			echo '<td><a href="update.php?email='.$stud->getEmail().'&firstName='.$stud->getFirstName().'&lastName='.$stud->getLastName().'&group='.$groupID.'"> <span class="glyphicon glyphicon-pencil"></span> </a>&nbsp; &nbsp; <a href="delete.php?email='.$stud->getEmail().'"> <span class="glyphicon glyphicon-minus"></span> </a>';
			echo "</tr>";
		}
	?>
	</table>
<div class="container">
	<a href="insert.php"> <span class="glyphicon glyphicon-plus"></span> Add new student</a>
</div>
</div>
</main>
<?php
	include "../navbar/footer.php";
?>