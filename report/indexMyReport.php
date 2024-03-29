<?php
	include "../navbar/navbar.php";
  include "rankingFunctions.php";
?>
   <h1>My Report</h1>
 
<!-- if condition only show this if report doesn't exist already -->
<a href="../fileUpload/upload.php"class="btn btn-primary">add a Report  <span class="badge">.txt</span></a>
<a href="../fileUpload/uploadXML.php"class="btn btn-primary">add a Report  <span class="badge">.xml</span></a>

<!-- end of if, show report otherwise. going for only upload report once and cannot modify for now -->
<br>
<?php
  include "report.php";
  include "../assessment/assessment.php";
  //Quering database for report associated with current user, using group id stored in current session
  $query =sprintf('SELECT * FROM `reports` WHERE group_ID='.$_SESSION['group']);
  $showResult = $conn->query($query);
  if(mysqli_num_rows($showResult)>0){
	  // only creating object of report for last uploaded report.
  while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){ 
    $newReport = new Report($row['group_ID'], $row['abstract'],$row['review1'],$row['review2']);
       // print_r($newReport);
  }
  

?>
<br>
 <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"> <?php echo 'Group: '.$newReport->getGroup_ID(); ?>'s Report </h3>
    </div>
  
    <div class="panel-body">
    	<h4 class="list-group-item-heading">Abstract</h4>
      <!-- Displaying report abstract field -->
     <p> <?php  echo $newReport->getAbstract(); ?> </p>
    </div>
    <hr>
    <div class="panel-body">
    	  	<h4 class="list-group-item-heading">Review One</h4>
          <!-- Displaying report review 1 field -->
    <p> <?php echo $newReport->getReview1();?></p>
    </div>
    <hr>
     <div class="panel-body">
     	  	<h4 class="list-group-item-heading">Review Two</h4>
                <!-- Displaying report review 2 field -->
      <p> <?php echo $newReport->getReview2();?></p>
    </div>
  </div>

<hr>

  <!-- Asssesments Rankings -->

<h1>Assesments</h1>
<h2>Ranking - 
  <?php
    
    $groupRanking = ranking();
    echo array_search($_SESSION['group'],array_keys($groupRanking))." out of ".sizeof($groupRanking)." groups."."\r\n";
    $groupID = $_SESSION['group'];
    $query = "SELECT reportID FROM reports WHERE group_ID = ".$_SESSION['group']."";
    $showResult = $conn->query($query);
    $reportID = $showResult->fetch_array(MYSQLI_ASSOC);
    $query = "SELECT assessments.assessmentID, assessments.comment, assessments.mark, assessments.criteria FROM assessments INNER JOIN groupreportassessment ON groupreportassessment.assessmentID = assessments.assessmentID WHERE groupreportassessment.report_ID = ".$reportID['reportID'].";";
    $result = $conn->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $assessmentID[]=$row['assessmentID'];
      $comment[]=$row['comment'];
      $mark[]=$row['mark'];
      $criteria[]=$row['criteria'];
    }
    $average_mark = array_sum($mark)/sizeof($mark);
    echo "Your group's average mark is ".$average_mark;

  ?>
</h2>
<!--Peer assessments on your report  -->

 <div class="row">
      <div>
      <hr>
    <div class="panel panel-primary">
    <div class="panel-heading"> <h4>Peer assessments on your report  </h4> 
</div> <!-- panel heading -->
<div class="panel-body">
   <?php
          for($i =0; $i<sizeof($comment);$i++){
            echo "<h4> Criteria: ".$criteria[$i]." Mark: ".$mark[$i]."</h4> \n";      
    ?>
  <h4> Comment:</h4>
  <p>
    <?php
     echo "$comment[$i]\n";
          $thisAssessment = $assessmentID[$i];
          $query = "SELECT group_ID FROM groupreportassessment WHERE assessmentID = ".$thisAssessment.";";
          $showResult = $conn->query($query);
          $thisGroup = $showResult->fetch_array(MYSQLI_ASSOC);
          $thisGroupID = $thisGroup['group_ID'];
          $thisGroupsMarks = averageMark($thisGroup['group_ID']);
          echo "<br><strong> The current average marks of this assessor group is $thisGroupsMarks. </strong>";
          echo "<hr>";
          }
          ?>
        </p>
        </div> <!--     panel-body -->
      </div> <!--  panel primary -->
      </div> <!-- col-9 -->
    </div> <!-- row -->
<?php
  } else {
	  echo "<br><p class='text-danger'>You don't have a report, add a new report</p>";
  }
	include "../navbar/footer.php";
?>
