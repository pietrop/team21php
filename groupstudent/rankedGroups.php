<?php
	include "../navbar/navbar.php";
	include "../admin/createAdminTables.php";
	include "../report/rankingFunctions.php";
	if (!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
?>
<main>
    <!--Group Rankings-->
    <div class="container">
        <div class="container">
        	<h2>Database Project: Group Rankings</h2>
        </div>
        <?php
			$rankArray = ranking(); //Array of ranked groups generated
			createRankedGroupTable($rankArray); //function creates table
        ?>
        <br>
        <a href="groups.php" class="btn btn-primary"> Back </a>
    </div>
</main>

<?php
	include "../navbar/footer.php";
?>