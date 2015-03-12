<?php
	include "../navbar/navbar.php";
	include "../admin/createAdminTables.php";
	if (!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
?>
<main>
	<div class="container">
    	<h2>Reports</h2>
    </div>
	<?php
	$query = "SELECT * FROM reports";
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		$reportsArray[] = $row;	
	}
	createReportTable($reportsArray);
	?>
</main>
<?php
	include "../navbar/footer.php";
?>