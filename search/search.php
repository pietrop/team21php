<?php

function search($searchTerm, $searchFor, $conn){
	switch($searchFor){
		case('student'):
		//Old query without querying mysql VIEWS
			//$query = "SELECT s.email, s.firstName, s.lastName, g.groupID FROM `students` AS s LEFT JOIN groups AS g ON s.email = g.student_ID WHERE (s.email LIKE '%".$searchTerm."%' OR s.firstName LIKE '%".$searchTerm."%' OR s.lastName LIKE '%".$searchTerm."%' OR g.groupID LIKE '%".$searchTerm."%')";
			$query = "SELECT * FROM `studentsWithGroupID` WHERE (email LIKE '%".$searchTerm."%' OR firstName LIKE '%".$searchTerm."%' OR lastName LIKE '%".$searchTerm."%' OR groupID LIKE '%".$searchTerm."%')";
		break;
		case('group'):
		//Old query without querying mysql VIEWS
			//$query = "SELECT g.groupID, s.email FROM groups AS g INNER JOIN students AS s WHERE (g.student_ID = s.email) AND (s.email LIKE '%".$searchTerm."%' OR s.firstName LIKE '%".$searchTerm."%' OR s.lastName LIKE '%".$searchTerm."%' OR g.groupID LIKE '%".$searchTerm."%')";
			$query = "SELECT * FROM `studentsWithGroupID` WHERE (email LIKE '%".$searchTerm."%' OR firstName LIKE '%".$searchTerm."%' OR lastName LIKE '%".$searchTerm."%' OR groupID LIKE '%".$searchTerm."%')";
		break;
	}
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		$array[] = $row;	
	}
	return $array;
}
function searchForum($searchTerm, $searchFor, $conn, $group){
	if ($group ==null){
		$query = "SELECT * FROM Forum WHERE (postID LIKE '%".$searchTerm."%' OR student_ID LIKE '%".$searchTerm."%' OR post LIKE '%".$searchTerm."%')";
	} else {
		$query = "SELECT f.postID, f.student_ID, f.post FROM `Forum` f LEFT JOIN groups g ON g.student_ID = f.student_ID WHERE g.groupID = ".$group." AND (f.postID LIKE '%".$searchTerm."%' OR f.student_ID LIKE '%".$searchTerm."%' OR f.post LIKE '%".$searchTerm."%')";
	}
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		$array[] = $row;	
	}
	return $array;
}
?>