<?php
	include "../navbar/navbar.php";
	include "report.php";
	include "../assessment/assessment.php";
	
	$assessmentID = $_GET['assessmentID'];
	
	// Query report to assess
	$query = sprintf("SELECT * FROM `groupreportassessment` AS g INNER JOIN reports AS r WHERE g.report_ID = r.reportID AND g.assessmentID =".$_GET['assessmentID']."");
	$showResult = $conn->query($query);
	
	// makes report object from the result fo query
	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		$newReport = new Report( $row['group_ID'], $row['abstract'],$row['review1'],$row['review2']);
	}
?>


<!-- SHOW REPORT TO ASSESS -->
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> Group: <?php echo $newReport->getGroup_ID();?> Report:</h3>
    </div>
    <div class="panel-body">
        <h4 class="list-group-item-heading">Abstract</h4>
        <p><?php echo $newReport->getAbstract();?></p>
    </div>
    <hr>
    <div class="panel-body">
        <h4 class="list-group-item-heading">Review One</h4>
        <p><?php  echo $newReport->getReview1();?></p>
    </div>
    <hr>
    <div class="panel-body">
        <h4 class="list-group-item-heading">Review Two</h4>
        <p><?php echo $newReport->getReview2(); ?></p>
    </div>
</div>
<!-- Make an assessment - Criteria, Mark, Comment  -->
<form action="../assessment/insertAction.php" method="post">
    <!-- changed type from text  to hidden as this should be provided by system trhough URL RESTFULL when navigation -->
    <input id="assessmentID"  type="hidden" name="assessmentID" placeholder="assessmentID" spellcheck="false" class="form-control" >
    <input value="<?php echo $assessmentID ?>" type="hidden" name="assessmentID" class="form-control">
    <br>
    <!--Criteria Label-->
    <label for="select" class="col-lg-2 control-label">Criteria</label>
    <!--Criteria Options-->
    <select class="form-control" id="criteria" name="criteria">
        <option  value="Readibility">Readibility</option>
        <option  value="Accuracy">Accuracy</option>
        <option  value="Creativity">Creativity</option>
    </select>
    <br>
    <!--Mark Label-->
    <label for="select" class="col-lg-2 control-label">Mark</label>
    <!--Mark dropdown-->
    <select class="form-control" id="mark" name="mark">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <!--Comment Label-->
    <label for="input" class="col-lg-2 control-label">Comment</label>
    <!--Comment Field-->
    <input id="comment" type="text" name="comment" placeholder="Comment" class="form-control">
    <br>
    <div class="clearer"></div>
    <!--Submit Button-->
    <input id="loginbtn" type="submit" value="Add" class="btn btn-primary">
</form>
<!-- End of make assesment form -->

<!-- Show assessments for this report -->
<?php
	$query = "SELECT * FROM assessments WHERE (assessmentID=$assessmentID)";
	$showResult = $conn->query($query);
	
	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		//Creating new assessment object
		$newAssessment = new Assessment($row['assessmentID'], $row['criteria'], $row['mark'],$row['comment']);
		$assessmentsArray[] = $newAssessment; //Array of assessments objects
	}
	
	if (!is_null($assessmentsArray)) {
		//Looping through all assessments objects
		foreach($assessmentsArray as $rep){
			echo "<br>";
			echo "<p><strong>Criteria: </strong>".$rep->getCriteria()." <strong>Mark: </strong>".$rep->getMark()."</p>";
			echo "<p><strong>Comment: </strong></p>";
			echo "<p>".$rep->getComment()."</p>";
			echo "<hr>";
		}
	}
?>
<br>


<?php
	include "../navbar/footer.php";
?>