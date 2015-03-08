<?php
 include "../navbar/navbar.php";
?>

            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="insertAction.php" method="post">
                	<input id="assessmentID" type="text" name="assessmentID" placeholder="assessmentID" spellcheck="false" class="form-control">
                  	<br>
                  	<input id="criteria" type="text" name="criteria" placeholder="Criteria" spellcheck="false" class="form-control">
                  	<br>
                    <input id="mark" type="text" name="mark" placeholder="Mark" class="form-control">
                    <br>
                    <input id="comment" type="text" name="comment" placeholder="comment" class="form-control">
                    <br>




  
                    <div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add" class="btn btn-primary">
              </form>
            </div>
 

   <?php
 include "../navbar/footer.php";
?>