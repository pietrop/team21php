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
 $query =sprintf("SELECT * FROM forummod where group_ID = ".$_SESSION['group']);  //need to edit this query later to include only stuff from current login and group members. see previous commits. 
 $showResult = $conn->query($query);


while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
// print_r($row);
	$postID[] = $row['postID'];
	$student_ID[] = $row['student_ID'];
	$topic[] = $row['topic'];
	$post[] = $row['post'];
}

//Want to print out the unique topics in the forum for this group.
$uniqueTopics = array();
foreach ($topic as $thisTopic) { 
	if(in_array($thisTopic, $uniqueTopics)){
		continue;
	}
	$uniqueTopics[] = $thisTopic;
		?>
			<h2>
				<a href="displayPostsFromTopic.php?topic=firstTopic"><?php echo $thisTopic; $_GET["forumtopic"] = $thisTopic; ?></a>  
			</h2>
		<?php
}

	include "../navbar/footer.php";
?>
