<?php
	include "../navbar/navbar.php";
	include "../admin/createAdminTables.php";
	if (!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
?>
<main>
    <div class="container">
        <div class="container">
            <h2>Database Project: Groups</h2>
        </div>
		<?php
            //Retrieving GROUPS list
			$whichGroupQuery = "SELECT * FROM studentsWithGroupID ORDER BY groupID";
			$showResult = $conn->query($whichGroupQuery);
			while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
				$groupsArray[] = $row; //Populating array which will be used for table creation
			}
            if (isset($groupsArray)){
                createGroupTable($groupsArray); //generates table
            } else {
                echo '<div class="container"><strong>There is no groups</strong></div>';	
            }
        ?>
    </div>
    <br>
    <a class="btn btn-primary" href="rankedGroups.php">Show Group Rankings</a>
</main>

<?php
	include "../navbar/footer.php";
?>