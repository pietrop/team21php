<?php
 include "../navbar/navbar.php";
?>

     
    <div class="row">
      <div class="col-sm-9 ">
        <h1>Main Menu</h1>
          <h2><a href="../groupstudent/groups.php">Your group</a></h2>
          <h2><a href="../report/indexReport.php">Your report</a></h2>
          <h2><a href="../groupReportAssessment/addGroupReportAssessment.php">Make a peer assessment</a></h2>
          <button type="button" class="btn btn-default"><a href="../login/logout.php">Sign out</a></button>

      </div> <!-- col-9 -->

      <div class="col-sm-3 ">

           <h2>Col 3</h2>
      </div> <!-- col-3 -->

    </div> <!-- row -->
<?php
 include "../navbar/footer.php";
?>