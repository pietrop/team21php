<html>
<head>
	<meta charset = "UTF-8">
</head>
<body>
<header>
	<h1>Database Project: Groups</h1>
	<a href="index.php">Students</a>
	<a href="#">Groups</a>
</header>
<main>
<table>
	<tr>
		<td><b> Group ID </b></td>
		<td><b> Student 1 </b></td>
		<td><b> Student 2 </b></td>
		<td><b> Student 3 </b></td>
		<td><b> Actions </b></td>
	</tr>
<!--RETRIEVING GROUPS LIST-->
<?php
	include "../dbConnect.php";

	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

	//Retrieving GROUPS list
	$whichGroupQuery = "SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID";
	$showResult = $conn->query($whichGroupQuery);
	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		$groupsArray[] = $row;
	}
	$currGroup = 0;
	foreach($groupsArray as $group){
		$counter = 0;
		if ($currGroup == 0){
			echo "<tr>";
			echo "<td>".$group['groupID']."</td>";
			echo "<td>".$group['email']."</td>";
			$counter++;
			$currGroup++;
		} elseif ($group['groupID']==$currGroup){
			echo "<td>".$group['email']."</td>";
			$counter++;
		} else {
			echo "</tr>";
			$counter = 0;
			//while($currGroup != $group['groupID']){
				$currGroup++;
			//}
			echo "<tr>";
			echo "<td>".$group['groupID']."</td>";
			echo "<td>".$group['email']."</td>";
			$counter++;
		}
	}

?>
</tr>
</table>


</main>


</body>


</html>