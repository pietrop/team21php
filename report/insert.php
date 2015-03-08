<?php
 include "../navbar/navbar.php";
?>
   
    <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="insertAction.php" method="post">
                    <br>
                    <input id="abstract" type="text" name="abstract" placeholder="Abstract"  class="form-control">
                    <br>
                    <input id="review1" type="text" name="review1" placeholder="First review"  class="form-control">
                    <br>
                    <input id="review2" type="text" name="review2" placeholder="Second review"  class="form-control">
                    <br>
                    <?php
                      include "report.php";
                      //reportID  groupID
                      $report = new report(2, 2, $_POST['abstract'], $_POST['review1'], $_POST['review2']);

                      $abstract = $report->getAbstract();
                      echo $abstract;

                      //Database related information
                      $hostname="127.0.0.1";
                      $user="root";
                      $password="root";

                      $conn = new mysqli($hostname,$user,$password);
                      // Check connection
                      if ($conn->connect_error) {
                          die("<p class='text-danger'>Connection failed: </p>" . $conn->connect_error);
                      } else {
                        echo "<p class='text-success'>Connection successful</p><br>";
                      }

                      $myDB = $conn->select_db("team21");

                      //$query = 'INSERT INTO admins(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
                      if (($query = $report->createInsertQuery()) != null){
                        $result = $conn->query(
                         "INSERT INTO `team21`.`reports` (`reportID`, `group_ID`, `abstract`, `review1`, `review2`) VALUES ('1', '1', 'Abstract', 'Review 1', 'Review 2')"
                          );
                        //$row = mysql_fetch_array($result);
                        //print_r($row);
                      }
                      ?>
                    <div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add" class="btn btn-primary">
              </form>
            </div>
            
  <?php
 include "../navbar/footer.php";
?>
