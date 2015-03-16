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
			<h2>Database Project: Students</h2>
        </div>
        <!--SEARCH FORM-->
        <form class="form-inline" action="index.php" method="post">
            <?php include "../search/searchForm.php"; ?>
            <input type="hidden" name="searchFor" value="student">
            <?php 
				if(isset($_POST['submit']) && $_POST['search'] != ''){
			?>
			<div class="form-group">
				<a href="index.php"><button type="button" class="btn btn-default">Reset</button></a>
			</div>
			<?php	
			}
			?>
        </form>
        
        <!--RETRIEVEING STUDENT LIST FROM DATABASE-->
        <?php

            //Retrieving students and groups from DB and storing in an Array
			if (!isset($_POST['search'])){
				//Old query without querying mysql VIEWS
				//$showResult = $conn->query("Select s.email, s.firstName, s.lastName, g.groupID FROM students AS s LEFT JOIN groups AS g ON s.email = g.student_ID");
				     
				$query = "SELECT * from studentsWithGroupID";

				$showResult = $conn->query($query);
				while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
					$studentsArray[] = $row;
				}
			} else {
				$studentsArray = search($_POST['search'], $_POST['searchFor'], $conn);	
			}
			if (isset($studentsArray)){
            	createStudentTable($studentsArray);
			} else {
				echo '<div class="container"><strong>No results</strong></div>';		
			}
        ?>
        
        <div class="container">
            <a class="btn btn-primary" href="insert.php">Add new student</a>
        </div>
    </div>
</main>
<?php
	include "../navbar/footer.php";
?>