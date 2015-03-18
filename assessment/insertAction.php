 <?php
	include "assessment.php";
	//assessment
	$assessment = new assessment($_POST['assessmentID'], $_POST['criteria'], $_POST['mark'], $_POST['comment']);
	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
	
	$query = $assessment->createInsertQuery();
	$conn->query($query);
?>

<!-- redirects using js -->
<script>
	location.href = "../report/myReportsToAssess.php";
</script>
