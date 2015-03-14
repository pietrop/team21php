<?php
	include "../navbar/navbar.php";
	include "../admin/createAdminTables.php";
	include "../search/search.php";
	if (!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
	print_r($_SESSION);
?>
<main>
<br>
<br>
<br>
<div class="container">
	<div class="container">
        <h2>Database Project: Groups</h2>
    </div>
    <form class="form-inline" action="groups.php" method="post">
		<?php include "../search/searchForm.php"; ?>
        <input type="hidden" name="searchFor" value="student">
        <?php 
			if(isset($_POST['submit']) && $_POST['search'] != ''){
		?>
		<div class="form-group">
			<a href="groups.php"><button type="button" class="btn btn-default">Reset</button></a>
		</div>
		<?php	
		}
		?>
    </form>
<?php
	//Retrieving GROUPS list
	if(!isset($_POST['search'])){
		//Old query without querying mysql VIEWS
		//$whichGroupQuery = "SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID";
		$whichGroupQuery = "SELECT * FROM studentsWithGroupID";
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


</main>

<?php
	include "../navbar/footer.php";
?>