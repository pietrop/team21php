  <?php
include "../navbar/navbar.php";
include "post.php";
  ?>
<h1>Forum</h1>

<a href="makePost.php"class="btn btn-primary">add a post</a>


<!-- Show all posts, but only for  -->
<?php
  $conn = connectToDb();
  $conn->select_db("team21");

 $query =sprintf("SELECT * FROM forum WHERE student_ID = 'a@b.com'");
 $showResult = $conn->query($query);
 // print_r($showResult);


?>




 



<hr>
<div class="media">
  <div class="media-left">
  </div>
  <div class="media-body">
   


<?php
   while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
   	//troubleshooting
   	print_r($row);
   	echo "<br>";
   	echo $row['student_ID'];
   	echo "<br>";
   	echo "<br>";
   	// end troubleshooting
    // $newReport = new Post($row['postID'],$row['student_ID'],$row['parentPost_ID'],$row['post']);
 	// print_r($newReport);
 	
 	if (is_null($row['parentPost_ID']) !=1) {
 	echo "<p>postID: <strong>". $row['postID']."</strong>" ;
 	// if (is_null($newReport->parentPost_ID) !=1) {
 	// 
 	echo " parentPost_ID: <strong>". $row['parentPost_ID']. "</strong></p>";
 // } 
 	echo "<p>". $row['post'] . "</p>";
 	// echo "<br>";
 	echo " <h6 class='media-heading'>". $row['student_ID'] . "</h6>";

 }else {
echo "<p>postID: <strong>". $row['postID'] ."</strong>" ;
// echo " parentPost_ID: <strong>".$newReport->parentPost_ID . "</strong></p>";
echo "<p>". $row['post'] . "</p>";
echo " <h6 class='media-heading'>". $row['student_ID'] . "</h6>";
}
?>
<!-- need some kind of loop to indent posts -_  -->
 <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="postAction.php" method="post">
                    <br>
                     <input id="student_ID" type="text" name="student_ID" placeholder="student_ID"  class="form-control" rows="3">
                     <input id="parentPost_ID" type="text" name="parentPost_ID" placeholder="parentPost_ID"  class="form-control" rows="3">
                     <input id="post" type="text" name="post" placeholder="Type something here..."  class="form-control" rows="3">
                    <br>                
                    <input id="loginbtn" type="submit" value="post" class="btn btn-primary">
              </form>
            </div>
<?php

 	echo "<hr>";
 }


  

?>

  </div>
</div>
