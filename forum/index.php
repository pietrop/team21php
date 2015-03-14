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
 $query =sprintf("SELECT * FROM forum ORDER BY `forum`.`parentPost_ID` ASC");  //need to edit this query later to include only stuff from current login and group members. see previous commits. 
 $showResult = $conn->query($query);
 print_r($showResult);


while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
// print_r($row);
	$postID[] = $row['postID'];
	$student_ID[] = $row['student_ID'];
	$parentPost_ID[] = $row['parentPost_ID'];
	$post[] = $row['post'];
}
// print_r($post);

function fetchChildren($parent, $postID, $student_ID, $parentPost_ID, $post ){
// echo (sizeof($postID));
//  echo "<br>";
 for ($i = 0; $i < sizeof($postID) ; $i++) {
// echo $i;
// echo "<br>";
    // echo ($parent);
  if ($parentPost_ID[$i] == $parent){
     // echo ($parent);
    return fetchChildren($postID[$i], $postID, $student_ID, $parentPost_ID, $post);
  }
}
return $parent;
}
// fetchChildren($parentPost_ID[0], $postID, $student_ID, $parentPost_ID, $post);



//Referenced -- http://evolvingweb.ca/blog/iterating-over-trees-php
class ForumIterator extends ArrayIterator implements RecursiveIterator{
	// Get a recursive iterator over the children of this item. 
	public function getChildren() { 
		$link_data = $this->current(); 
		return new ForumIterator($link_data['below']); 
	}   

	// Does this item have children? 
	public function hasChildren() { 
		$link_data = $this->current(); 
		return !empty($link_data['below']); 
	} 
}

echo "string";
$menu = drush_get_option('menu'); 
$tree = menu_build_tree($menu);
print_r($menu);

?>


<?php
	include "../navbar/footer.php";
?>
