  <?php
include "../navbar/navbar.php";
  ?>
   <h1>My Report</h1>
 
<!-- if condition only show this if report doesn't exist already -->
<a href="../fileUpload/upload.php"class="btn btn-primary">add a Report</a>

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

   <!-- </div> -->
  </div>
  <?php
   include "../navbar/footer.php";
  ?>