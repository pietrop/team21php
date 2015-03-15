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
	$forumtopic = $_GET["topic"]; //iron this out. as asset. 
	?> 
	<h2><?php echo $forumtopic; ?></h2>
	<?php
	//FIX THIS!!! Ask asset or pietro
	// $query = sprintf("SELECT * FROM forummod where topic = %s and group_ID = ".$_SESSION['group'] , $forumtopic);
	$query = sprintf("SELECT * FROM forummod where topic = 'firstTopic' and group_ID = ".$_SESSION['group'] );
	$showResult = $conn->query($query);

	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		$postID[] = $row['postID'];
		$student_ID[] = $row['student_ID'];
		$topic[] = $row['topic'];
		$post[] = $row['post'];
	}

	for ($i=0; $i < sizeof($post); $i++) { 
		?>
		<BR>
			<h3>
				<?php echo $student_ID[$i]; ?>
			</h3>
			<br>
			<p>
				<?php echo $post[$i]; ?>
			</p>
		<?php
	}
?>
	<BR>
	<form form action="insertForumPost.php?topic=firstTopic" method="post">
		<label for="input" class="col-lg-2 control-label">Make new post on this topic</label>
        <input id="post" type="text" name="post" placeholder="post" class="form-control">
        <br>
        <div class="clearer"></div>
        <input id="loginbtn" type="submit" value="Add" class="btn btn-primary">
	</form>




<?php
	include "../navbar/footer.php";
?>

