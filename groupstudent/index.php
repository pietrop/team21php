<?php
	include "../navbar/navbar.php";
	include "../admin/createAdminTables.php";
	include "../search/search.php";
	if (!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
?>
<main>
	<div class="container">
    	<div class="container">
			<h3>Database Project: Students</h3>
        </div>
        <!--SEARCH FORM-->
        <form class="form-inline" action="index.php" method="post">
            <?php include "../search/searchForm.php"; ?>
            <input type="hidden" name="searchFor" value="student">
        </form>
        
        <!--RETRIEVEING STUDENT LIST FROM DATABASE-->
        <?php
            //Retrieving students and groups from DB and storing in an Array
			if (!isset($_POST['search'])){
				$showResult = $conn->query("Select s.email, s.firstName, s.lastName, g.groupID FROM students AS s LEFT JOIN groups AS g ON s.email = g.student_ID");
				while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
					$studentsArray[] = $row;
				}
			} else {
				$studentsArray = search($_POST['search'], $_POST['searchFor'], $conn);	
			}
            createStudentTable($studentsArray);
        ?>
        
        <div class="container">
            <a href="insert.php"> <span class="glyphicon glyphicon-plus"></span> Add new student</a>
        </div>
    </div>
</main>
<?php
	include "../navbar/footer.php";
?>