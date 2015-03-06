<?php
include "groupReportAssessment.php";
include "../dbConnect.php";

// echo "test";
session_start();

// store session data
if (isset($_SESSION['id']))
  $_SESSION['username'] = $_SESSION['username']; // or if you have any algo.
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peer Review System - Add assessment</title>

    <!-- Bootstrap -->
    <link href="../bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

      <div class="row">
    <h1>Welcome to Team 21 Peer Review System</h1>
    <h2> 
      <?php
        echo 'You are logged in as '.$_SESSION['username'];
        ?>.
    </h2>
    </div> <!-- row -->

  <header role="banner">
    </header>
  <main role='main'>
      <article>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form role ="form" action="indexGroupReportAssessment.php" method="post">            
                  <div class='form-group'>
                    <BR>
                  <b>Select the group to assess</b>
                  <select id="report" name="report" placeholder = "groupID">
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
                  <div class="clearer"></div>
                 </div>
                 <button type="submit" class="btn btn-default">Add Assessment</button>
               </form>
        </article>
    </main>
  </div>
</body>
</html>