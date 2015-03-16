<?php
	include "../navbar/navbar.php";
	if(!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
	$query = 'SELECT DISTINCT groupID FROM groups';
	$result = $conn->query($query);	
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $groupsArray[] = $row['groupID'];
    }
    $numberOfGroups = sizeof($groupsArray);
    $numberOfAssessments = $_POST['numberOfAssessments'];
    $clearPrevious = $_POST['clearPrevious'];
    if($clearPrevious){
    	$query = ("DELETE FROM groupreportassessment ;")
    }
    for ($i=1; $i <= $numberOfGroups; $i++) { 
    	for ($j=1; $j <= $numberOfAssessments; $j++) { 
    		
    	}
    }




    header("Location: showAssessments.php");

?>