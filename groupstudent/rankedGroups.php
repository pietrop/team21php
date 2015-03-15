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
        <h2>Database Project: Group Rankings</h2>
    </div>
    <?php
    	include "../report/rankingFunctions.php";
    	$rankArray = ranking();
		createRankedGroupTable($rankArray);
	?>

</div>


</main>

<?php
	include "../navbar/footer.php";
?>