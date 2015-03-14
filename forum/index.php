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
 // $conn = connectToDb();
  //$conn->select_db("team21");
 $studentN = $_SESSION['email'];
// echo $studentN ;
 $query =sprintf("SELECT * FROM forum WHERE student_ID = '$studentN'");
 $showResult = $conn->query($query);
 // print_r($showResult);


while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
// print_r($row);
$postID [] = $row['postID'];
$student_ID [] = $row['student_ID'];
$parentPost_ID [] = $row['parentPost_ID'];
$post [] = $row['post'];

}

print_r($post );

function fetchChildren($parent, $postID, $student_ID, $parentPost_ID, $post ){
// echo (sizeof($postID));
//  echo "<br>";
 for ($i = 0; $i < sizeof($postID) ; $i++) {
// echo $i;
// echo "<br>";
    // echo ($parent);
  if ($parentPost_ID[i] == $parent){
     // echo ($parent);
    fetchChildren($postID[i], $postID, $student_ID, $parentPost_ID, $post);

  }

}

return $parent;

}


fetchChildren($parentPost_ID[0], $postID, $student_ID, $parentPost_ID, $post);



?>


<?php
	include "../navbar/footer.php";
?>
