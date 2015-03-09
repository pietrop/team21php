  <?php
   include "../navbar/navbar.php";
  ?>

<?php 

include "report.php";
include "../assessment/assessment.php";

   $conn = connectToDb();
   $conn->select_db("team21");
// $query = "SELECT * FROM assessments";
$query ="SELECT `reportID`, `group_ID`, `abstract`, `review1`, `review2` FROM `reports` WHERE (reportID= 11 AND group_ID = 11);";
$showResult = $conn->query($query);

while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
  $newReport = new Report($row['reportID'], $row['group_ID'], $row['abstract'],$row['review1'],$row['review2']);
}
?>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"> Group:
<?php 
echo $newReport->getGroup_ID();
?>
    Report: 

    <?php 
echo $newReport->getReportID();
?>
      </h3>
    </div>
  <!--   <div class="btn-group btn-group-justified">
    <a href="#" class="btn btn-default">Rate</a>
    <a href="#" class="btn btn-default">Comment</a>
  </div>	
   -->
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

  <!-- Show assessments for this report -->


  <!-- Make an assessment - Criteria, Mark, Comment  -->

  <form action="../assessment/insertAction.php" method="post">
                  <!-- changed type from text  to hidden as this should be provided by system trhough URL RESTFULL when navigation -->
                  <input id="assessmentID"  type="hidden" name="assessmentID" placeholder="assessmentID" spellcheck="false" class="form-control" >
                    <br>

                    <label for="select" class="col-lg-2 control-label">Criteria</label>
                    <!-- <input id="criteria" type="text" name="criteria" placeholder="Criteria" spellcheck="false" class="form-control"> -->
                     
                     <!-- select needs name in select tag, and value in option tag to work -->
                        <select class="form-control" id="criteria" name="criteria">
                          <option  value="Readibility">Readibility</option>
                          <option  value="Accuracy">Accuracy</option>
                          <option  value="Creativity">Creativity</option>
                        </select>


                    <br>
                    <!-- <input id="mark" type="text" name="mark" placeholder="Mark" class="form-control"> -->
                    
                      <label for="select" class="col-lg-2 control-label">Mark</label>
                    
                   
                        <select class="form-control" id="mark" name="mark">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
  
  
   

                    <br>
                   <label for="input" class="col-lg-2 control-label">Comment</label>
                    <input id="comment" type="text" name="comment" placeholder="comment" class="form-control">
            
                    <br>




  
                    <div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add" class="btn btn-primary">
              </form>



   <!-- </div> -->
  </div>
  <?php
   include "../navbar/footer.php";
  ?>