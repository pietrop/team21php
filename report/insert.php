<!-- not needed -->
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
                    
                    <div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add" class="btn btn-primary">
              </form>
            </div>
            
  <?php
 include "../navbar/footer.php";
?>
