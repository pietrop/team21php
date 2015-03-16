<?php
	include "../navbar/navbar.php";
	include "groupReportAssessment.php";
	if(!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
	$query = 'SELECT DISTINCT groupID FROM groups';
	$result = $conn->query($query);	
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $groupsArray[] = $row['groupID'];
    }
    $numberOfGroups = sizeof($groupsArray);
    echo "number of groups is ".$numberOfGroups;
    $numberOfAssessments = $_POST['numberOfAssessments'];
    echo "number of assessments per group is ".$numberOfAssessments;
    if(isset($_POST['clearPrevious'])){
    	$clearPrevious = true;
    }
    else{
    	$clearPrevious = false;
    }
    if($clearPrevious){
    	$query = "DELETE FROM groupreportassessment";
    	$result = $conn->query($query);	
    	echo "Cleared initial table";
    }
    for ($i=1; $i <= $numberOfGroups; $i++) { 
    	for ($j=1; $j <= $numberOfAssessments; $j++) { 
    		$assessee = mt_rand(1, $numberOfGroups);
    		$assessment = new GroupReportAssessment($i, $assessee);
			//$query = 'INSERT INTO groupreportassessment(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
			echo "string";
			if (($query = $assessment->createInsertQuery()) != null){
				$result = $conn->query($query);
				echo "inserted an assessment for group ".$i."to assess group".$assessee."
				\n";
			}
    	}
    }




    // header("Location: showAssessments.php");

?>