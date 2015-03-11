<?php

function search($searchTerm, $searchFor, $conn){
	switch($searchFor){
		case('student'):
			$query = "SELECT s.email, s.firstName, s.lastName, g.groupID FROM `students` AS s LEFT JOIN groups AS g ON s.email = g.student_ID WHERE (s.email LIKE '%".$searchTerm."%' OR s.firstName LIKE '%".$searchTerm."%' OR s.lastName LIKE '%".$searchTerm."%' OR g.groupID LIKE '%".$searchTerm."%')";
		break;
		case('group'):
			$query = "SELECT g.groupID, s.email FROM groups AS g INNER JOIN students AS s WHERE g.student_ID = s.email AND (s.email LIKE '%".$searchTerm."%' OR s.firstName LIKE '%".$searchTerm."%' OR s.lastName LIKE '%".$searchTerm."%' OR g.groupID LIKE '%".$searchTerm."%')";
		break;
	}
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		$array[] = $row;	
	}
	return $array;
}
?>