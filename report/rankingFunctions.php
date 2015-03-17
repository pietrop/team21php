<?php
  function averageMark($group){
    //Notes - This function returns the average mark recieved by the given group. Argument is groupID of group in question.
    $conn = connectToDb();
    $conn->select_db("team21");
    $query = "SELECT reportID FROM reports WHERE group_ID = ".$group."";
    $showResult = $conn->query($query);
	$reportID = $showResult->fetch_array(MYSQLI_ASSOC);
	if(isset($reportID)){
		$query = "SELECT assessments.assessmentID, assessments.comment, assessments.mark, assessments.criteria FROM assessments INNER JOIN groupreportassessment ON groupreportassessment.assessmentID = assessments.assessmentID WHERE groupreportassessment.report_ID = ".$reportID['reportID'].";";
		$result = $conn->query($query);
		if ($result->num_rows != 0){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			  $_comment[]=$row['comment'];
			  $_mark[]=$row['mark'];
			  $_criteria[]=$row['criteria'];
			}
			$_average_mark = array_sum($_mark)/sizeof($_mark);
			return $_average_mark;
		} else {
			return "N/A";	
		}
	} else {
		return "N/A";	
	}
  }
  function ranking(){
    //Notes - This function will return a sorted array of groups and their average marks. It is sorted in
    //        descending order of marks. So the position of the group in the array will be the rank. 
    $conn = connectToDb();
    $conn->select_db("team21");
    $query = "SELECT group_ID FROM `reports`;";
    $result = $conn->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $averageMarkArray[$row['group_ID']] = averageMark($row['group_ID']);
    }
    arsort($averageMarkArray);
    return $averageMarkArray;
  }
?>