<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

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
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="indexGroupReportAssessment.php" method="post">
                  <b>Select the group to assess</b>
                  <select id="report" name="report" placeholder = "groupID">
                    <?php
                      include "../dbConnect.php";

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
                  <input id="loginbtn" type="submit" value="Add">
              </form>
            </div>
        </article>
    </main>
  </div>
</body>
</html>
