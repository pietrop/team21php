<?php
	include "../navbar/navbar.php";
	if(!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}

?>
<h1>Auto Assigning assessments for all groups</h1>
<?php
	$query = 'SELECT DISTINCT groupID FROM groups';
	$result = $conn->query($query);	
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $groupsArray[] = $row['groupID'];
    }
    $numberOfGroups = sizeof($groupsArray);
    echo '<p> There are '.$numberOfGroups.' groups registered in the system. </p>';
    echo "<p>How many assessments do you want every group to make?</p>";
?>
<form role ="form" action="makeAutoAssessments.php" method="post">
	<select id="numberOfAssessments" name="numberOfAssessments">
		<?php
		for ($i=1; $i < $numberOfGroups; $i++) { 
			echo '<option>'.$i.'</option>';
		}
		?>
	</select>
	<br>
	<input type="checkbox" name="clearPrevious" value="clearPrevious" id="clearPrevious">Clear previous assigned assessments.<br>
	<br>
  	<button type="submit" class="btn btn-default">Automatically Assign</button>

</form>
