  <?php
include "../navbar/navbar.php";
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

    $conn = connectToDb();
  $conn->select_db("team21");

  $query =sprintf("SELECT * FROM `reports`");
  $showResult = $conn->query($query);
  // print_r($showResult);
while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
    $newReport = new Report($row['group_ID'], $row['abstract'],$row['review1'],$row['review2']);
  }
  

?>
<br>
 <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"> Group:
<?php 

echo $newReport->getGroup_ID();
?>
    Report: 

      </h3>
    </div>
  
    <div class="panel-body">
    	<h4 class="list-group-item-heading">Abstract</h4>
     <p> 
<?php 

echo $newReport->getAbstract();
?>
     </p>
    </div>
    <hr>
    <div class="panel-body">
    	  	<h4 class="list-group-item-heading">Review One</h4>
    <p> 
<?php 
echo $newReport->getReview1();
?>
    </p>
    </div>
    <hr>
     <div class="panel-body">
     	  	<h4 class="list-group-item-heading">Review Two</h4>
      <p> 
<?php 
echo $newReport->getReview2();
?>
      </p>
    </div>
  </div>

<hr>

  <!-- Asssesments -->

<h1>Assesments</h1>
 <div class="panel panel-primary">
    <div class="panel-heading">
    	<h4>Criteria:   Mark:</h4> 
   </div>
    <div class="panel-body">
    	<h4>Comment:</h4> 
   </div>
      </div>
<br>


<!--Peer assessments on your report  -->

 <div class="row">
      <div class="col-sm-9 ">
        <h1>Peer assessments on your report</h1>
        <h3>
        <?php

          $groupID = $_SESSION['group'];

          $query = "SELECT reportID FROM reports WHERE group_ID = ".$_SESSION['group']."";
          $showResult = $conn->query($query);
          // echo "showResult is $showResult";

          $reportID = $showResult->fetch_array(MYSQLI_ASSOC);
          $query = "SELECT * FROM assessments WHERE assessmentID = (SELECT assessmentID FROM groupReportAssessment WHERE report_ID = ".$reportID['reportID'].")";
          $result = $conn->query($query);
           print_r($result);
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
           
            $comment[]=$row['comment'];
           
            $mark[]=$row['mark'];
            $criteria[]=$row['criteria'];
          }
          for($i =0; $i<sizeof($comment);$i++){
            echo "Criteria - ".$criteria[$i].". Mark - ".$mark[$i].". Comment - ".$comment[$i]."\n";
          }
         
        ?>
      </h3>
      </div> <!-- col-9 -->


   <!-- </div> -->
