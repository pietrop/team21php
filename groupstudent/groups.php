<?php
	include "../navbar/navbar.php";
	if (!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
?>
<main>
<br>
<br>
<br>
<div class="container">
	<div class="container">
        <h1>Database Project: Groups</h1>
    </div>
<table class="table">
	<tr>
		<td><b> Group ID </b></td>
		<td><b> Student 1 </b></td>
		<td><b> Student 2 </b></td>
		<td><b> Student 3 </b></td>
		<td><b> Actions </b></td>
	</tr>
<!--RETRIEVING GROUPS LIST-->
<?php
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
</div>


</main>

<?php
	include "../navbar/footer.php";
?>