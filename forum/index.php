  <?php
/*Things left to do on this page
- indent loop using bootstrap media tag
- group posts by root, and parent child in display
- 

*/
include "../navbar/navbar.php";
include "post.php";
  ?>
<h1>Forum</h1>
<?php
  $conn = connectToDb();
  $conn->select_db("team21");
 $studentN = $_SESSION['email'];
// echo $studentN ;
 $query =sprintf("SELECT * FROM forum WHERE student_ID = '$studentN'");
 $showResult = $conn->query($query);
 // print_r($showResult);


?>

<!-- <a href="postAction.php"class="btn btn-primary">add a post</a> -->
 <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="postAction.php" method="post">
                    <br>
                     <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID" value="<?php echo  $studentN ?>"  class="form-control" rows="3">
                     <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo null ?>"  class="form-control" rows="3">
                     <input id="post" type="text" name="post" placeholder="Type something here..."  class="form-control" rows="3">
                    <br>                
                    <input id="loginbtn" type="submit" value="post" class="btn btn-primary">
              </form>
            </div>

<!-- Show all posts, but only for  -->




 



<hr>
<div class="media">
  <div class="media-left">
  </div>
  <div class="media-body">
   


<?php
   while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
   	//troubleshooting
   	// print_r($row);
   	// echo "<br>";
   	// echo $row['student_ID'];
   	// echo "<br>";
   	// echo "<br>";
   	// end troubleshooting
    // $newReport = new Post($row['postID'],$row['student_ID'],$row['parentPost_ID'],$row['post']);
 	// print_r($newReport);
 	
 	if (is_null($row['parentPost_ID']) !=1) {
    //NON ROOOT POSTS
 	echo "<p>postID: <strong>". $row['postID']."</strong>" ;
 	// if (is_null($newReport->parentPost_ID) !=1) {
 	// 
 	echo " parentPost_ID: <strong>". $row['parentPost_ID']. "</strong></p>";
 // } 
 	echo "<p>". $row['post'] . "</p>";
 	// echo "<br>";
 	echo " <h6 class='media-heading'>". $row['student_ID'] . "</h6>";

?>
<div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="postAction.php" method="post">
                    <br>
                     <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID"  value="<?php echo $row['student_ID'] ?>" class="form-control" rows="3">
                     <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo null ?>" class="form-control" rows="3">
                     <input id="post" type="text" name="post" placeholder="Type something here..." class="form-control" rows="3">
                    <br>                
                    <input id="loginbtn" type="submit" value="post" class="btn btn-primary">
              </form>
            </div>

<?php
 }else {

  // **************************** ELSE IS THE CASE IN WHICH IS NOT A ROOT POST  **************************** //

echo "<p>postID: <strong>". $row['postID'] ."</strong>" ;
// echo " parentPost_ID: <strong>".$newReport->parentPost_ID . "</strong></p>";
echo "<p>". $row['post'] . "</p>";
echo " <h6 class='media-heading'>". $row['student_ID'] . "</h6>";

?>
<!-- need some kind of loop to indent posts -_  -->
 <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="postAction.php" method="post">
                    <br>
                     <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID"  value="<?php echo $row['student_ID'] ?>" class="form-control" rows="3">
                     <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo $row['parentPost_ID']?>" class="form-control" rows="3">
                     <input id="post" type="text" name="post" placeholder="Type something here..."  class="form-control" rows="3">
                    <br>                
                    <input id="loginbtn" type="submit" value="post" class="btn btn-primary">
              </form>
            </div>
<?php
}
 	echo "<hr>";
 }


  

?>

  </div>
</div>
<?php
	include "../navbar/footer.php";
?>