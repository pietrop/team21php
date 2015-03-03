<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add new assessment</title>

</head>

<body >
	<header role="banner">
    </header>
	<main role='main'>
    	<article>
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="indexGroupReportAssessment.php" method="post">
                  <b>Select the group to assess</b>
                  <select name"group">
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
</body>
</html>
