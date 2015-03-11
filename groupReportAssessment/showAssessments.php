<?php
	include "../navbar/navbar.php";
	if(!isAdmin()){
		include "../login/redirectToNotAllowed.php";	
	}
	$query = "SELECT g.group_ID, r.group_ID AS reportGroup FROM `groupreportassessment` AS g INNER JOIN reports AS r WHERE r.reportID = g.report_ID ORDER BY g.group_ID";
	$result = $conn->query($query);
?>
<main>

<a data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse" class="btn btn-success btn-sm">Add new assessment</a> 
<div class="container well collapse" id="collapse">
  <form role ="form" action="indexGroupReportAssessment.php" method="post">            
    <div class='form-group'>
      <BR>
      <b>Select the group which should make the assessment</b>
      <select id="assessor" name="assessor">
        <?php              
          //QUERY TO DETERMINE AVAILABLE GROUPS
          $query = "SELECT `groupID`, COUNT(`student_ID`) as count FROM `groups` GROUP BY `groupID`";
          $showResult = $conn->query($query);
          while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
              $groupsArray[] = $row;
          }
          //Show groups in select
          foreach($groupsArray as $group){
                  echo "<option value=\"".$group['groupID']."\">".$group['groupID']."</option>";
          }
        ?>
      </select>
      <BR>
      <b>Select the group to be assessed</b>
      <select id="assessee" name="assessee">
        <?php              
          //QUERY TO DETERMINE AVAILABLE GROUPS
          $query = "SELECT `groupID`, COUNT(`student_ID`) as count FROM `groups` GROUP BY `groupID`";
          $showResult = $conn->query($query);
          while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
              $groupsArray2[] = $row;
          }
          //Show groups in select
          foreach($groupsArray2 as $group){
                  echo "<option value=\"".$group['groupID']."\">".$group['groupID']."</option>";
          }              
        ?>
      </select>
      <!-- <input type="text" name="text"></input> -->
      <div class="clearer"></div>
    </div>
   <button type="submit" class="btn btn-default">Add Assessment</button>
  </form>
</div>      
      
      
      
<?php
//PHP REQUIRED TO DISPLAY ASSESSMENTS ASSIGNMENTS
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$assessmentArray[] = $row;	
	}
	$prevGroup = $assessmentArray[0]['group_ID'];
	foreach($assessmentArray as $smallArray){
		$currGroup = $smallArray['group_ID'];
		if($currGroup == $prevGroup){
			$newArray[] = $smallArray['reportGroup'];	
		} else {
			$newAssessmentArray[$prevGroup] = $newArray;
			$newArray = Array();	
			$newArray[] = $smallArray['reportGroup'];
			$prevGroup = $currGroup;
		}	
	}
	$newAssessmentArray[$prevGroup] = $newArray;
?>
<div class="container">
    <table class="table">
        <tr>
            <td> Group </td>
            <td> Assesses </td>
        </tr>
        <?php
            $arraySize = count($newAssessmentArray);
            for($i = 1; $i<=$arraySize; $i++){
                if (isset($newAssessmentArray[$i])){
        ?>
        <tr>
            <td> <?php echo $i?> </td>
            <td> <?php
                    for ($j=0; $j<count($newAssessmentArray[$i]); $j++){
                        echo '<span style="padding-right: 10px;">';
                        echo $newAssessmentArray[$i][$j];	
                        echo "</span>";
                    }
                ?></td>
        <?php
                } else {
                    $arraySize++;	
                }
            }
        ?>
    </table>
</div>
</main>

<?php
	include "../navbar/footer.php";
?>