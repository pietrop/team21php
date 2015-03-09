<?php
 include "../navbar/navbar.php";
?>

            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="insertAction.php" method="post">
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
                    
                    <!-- not working -->
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
            </div>
 

   <?php
 include "../navbar/footer.php";
?>