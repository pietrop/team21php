<?php
/**
*Student search. Returns array.
**/
function search($searchTerm, $searchFor, $conn){
	$searchTerm = mysqli_real_escape_string($conn, $searchTerm);
	$searchFor = mysqli_real_escape_string($conn, $searchFor);
	switch($searchFor){
		case('student'):
			$query = "SELECT * FROM `studentsWithGroupID` WHERE (email LIKE '%".$searchTerm."%' OR firstName LIKE '%".$searchTerm."%' OR lastName LIKE '%".$searchTerm."%' OR groupID LIKE '%".$searchTerm."%') ORDER BY groupID";
		break;
	}
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		$array[] = $row;	
	}
	return $array;
}
/**
*Forum search. Returns array.
**/
function searchForum($searchTerm, $searchFor, $conn, $group){
	$searchTerm = mysqli_real_escape_string($conn, $searchTerm);
	$searchFor = mysqli_real_escape_string($conn, $searchFor);
	//Making sure that admin can search the entire forum, while students can search for posts relevant to their groups
	if ($group ==null){
		$query = "SELECT * FROM Forum WHERE (postID LIKE '%".$searchTerm."%' OR student_ID LIKE '%".$searchTerm."%' OR post LIKE '%".$searchTerm."%')";
	} else {
		$query = "SELECT f.postID, f.student_ID, f.post FROM `Forum` f LEFT JOIN groups g ON g.student_ID = f.student_ID LEFT JOIN admins a ON a.email = f.student_ID WHERE (g.groupID = ".$group." OR a.email=f.student_ID) AND (f.postID LIKE '%".$searchTerm."%' OR f.student_ID LIKE '%".$searchTerm."%' OR f.post LIKE '%".$searchTerm."%')";
	}
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		$array[] = $row;	
	}
	return $array;
}
?>