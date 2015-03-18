<?php
	include "../navbar/navbar.php";
	include "../report/report.php";
	
	if( $_FILES['file']['name'] == "" ){
	   die("No file specified!");
	}
?>

<?php
	$uploadedReport = file_get_contents($_FILES['file']['tmp_name'], true);
	
	$sectionsArray = explode("\n\n", $uploadedReport); //Parsing .txt file
	
	$abstractText = mysqli_real_escape_string($conn, $sectionsArray[1]);
	$review1Text = mysqli_real_escape_string($conn, $sectionsArray[3]);
	$review2Text =  mysqli_real_escape_string($conn, $sectionsArray[5]);
	//Storing parts of the report into Report object
	$report = new Report( $_SESSION['group'], $abstractText, $review1Text, $review1Text); 
	
	$query = $report->createInsertQuery();
	$conn->query($query);
?>
<!--Redirecting using js-->
<script>
	location.href = "../report/indexMyReport.php";
</script>
		