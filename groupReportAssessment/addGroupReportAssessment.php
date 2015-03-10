<?php
 include "../navbar/navbar.php";
 if (!isAdmin()){
    include "../login/redirectToNotAllowed.php";  
  }
?>
  <header role="banner">
    </header>
  <main role='main'>
    <article>
      <h1>Assign groups to assess reports</h1>
      <form role ="form" action="indexGroupReportAssessment.php" method="post">            
        <div class='form-group'>
          <BR>
          <b>Select the group which should make the assessment</b>
          <select id="group" name="group" placeholder = "groupID">
            <?php

              //****DATABASE CONNECTION
              $conn = connectToDb();
              $conn->select_db("team21");
              //****END OF CONNECTION PROCEDURE****
              
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
          <b>Select the report to be assessed</b>
          <select id="report" name="report" placeholder = "groupID">
            <?php

              //****DATABASE CONNECTION
              $conn = connectToDb();
              $conn->select_db("team21");
              //****END OF CONNECTION PROCEDURE****
              
              //QUERY TO DETERMINE AVAILABLE GROUPS
              $query = "SELECT `reportID` FROM `reports`";
              $showResult = $conn->query($query);
              while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
                  $reportsArray[] = $row;
              }
              //Show groups in select
              foreach($reportsArray as $report){
                      echo "<option value=\"".$report['reportID']."\">".$report['reportID']."</option>";
              }
            ?>
          </select>
          <div class="clearer"></div>
        </div>
       <button type="submit" class="btn btn-default">Add Assessment</button>
      </form>
    </article>
  </main>
<?php
 include "../navbar/footer.php";
?>

