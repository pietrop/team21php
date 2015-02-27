<html>
<head>
	<meta charset = "UTF-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<title> Group & Students </title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only"> Toggle Navigation </span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span class="navbar-brand"> GC06 </span>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="#">Students</a>
					</li>
					<li>
						<a href="groups.php">Groups</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<main>
	<div class="container">
		<div class="starter-template">
			<br>
			<br>
			<br>
		<h1>Database Project: Students</h1>
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
</div>
</div>
</main>


</body>


</html>