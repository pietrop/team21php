<html>
<head>
	<meta charset = "UTF-8">
</head>
<body>
<header>
	<h1>Database Project: Students</h1>
	<a href="#">Students</a>
	<a href="groups.php">Groups</a>
</header>
<main>
	<!--LIST OF STUDENTS FROM DATABASE-->
<table>
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
	include "../dbConnect.php";

	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

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
		echo "<tr>";
		echo "<td>".$stud->getEmail()."</td>";
		echo "<td>".$stud->getFirstName()."</td>";
		echo "<td>".$stud->getLastName()."</td>";
		echo "<td>".$groupID."</td>";
		echo '<td><a href="update.php?email='.$stud->getEmail().'&firstName='.$stud->getFirstName().'&lastName='.$stud->getLastName().'&group='.$groupID.'"> Update </a>&nbsp; &nbsp; <a href="delete.php?email='.$stud->getEmail().'"> Delete </a>';
		echo "</tr>";
	}
?>
</table>
<br>
<br>
<a href="insert.php"> Add new student </a>

</main>


</body>


</html>