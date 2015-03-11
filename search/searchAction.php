<?php
include "../navbar/navbar.php";
include "../admin/createAdminTables.php";
include "../groupstudent/student.php";
if(isset($_POST['search']) && $_POST['search'] != ""){
	$searchTerm = $_POST['search'];
	$searchFor = $_POST['searchFor'];
	switch($searchFor){
		case('student'): 
			$query = "SELECT s.email, s.firstName, s.lastName, g.groupID FROM `students` AS s INNER JOIN groups AS g WHERE s.email = g.student_ID AND (s.email LIKE '%".$searchTerm."%' OR s.firstName LIKE '%".$searchTerm."%' OR s.lastName LIKE '%".$searchTerm."%' OR g.groupID LIKE '%".$searchTerm."%')";
		break;
	}
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		//$student = new Student($row['email'],$row['firstName'],$row['lastName'],null);
		$array[] = $row;	
	}
	if (count($array)>0){
		createStudentTable($array);
	} else {
		echo "No results";	
	}
} else {
?>
	<script>
		location.href="search.php";
	</script>
<?php	
}
?>

<?php
include "../navbar/footer.php";
?>