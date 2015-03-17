<?php
	include "../navbar/navbar.php";
	include "../admin/createAdminTables.php";
	include "../search/search.php";
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
        <h2>Database Project: Groups</h2>
    </div>
<?php
	//Retrieving GROUPS list
	if(!isset($_POST['search'])){
		$whichGroupQuery = "SELECT * FROM studentsWithGroupID ORDER BY groupID";
		$showResult = $conn->query($whichGroupQuery);
		while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
			$groupsArray[] = $row;
		}
	} else {
		$groupsArray = search($_POST['search'], $_POST['searchFor'], $conn);	
	}
	if (isset($groupsArray)){
		createGroupTable($groupsArray);
	} else {
		echo '<div class="container"><strong>No results</strong></div>';	
	}
?>
</div>
<a class="btn btn-primary" href="rankedGroups.php">Show Group Rankings</a>

</main>

<?php
	include "../navbar/footer.php";
?>