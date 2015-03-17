<?php
	include "post.php";
	include "../dbConnect.php";
	//****DATABASE CONNECTION****
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
	
	//Creating new object of the class Post
	$post = new Post($_POST['student_ID'],$_POST['parentPost_ID'],mysqli_real_escape_string($conn, $_POST['post']));
	
	if ($post->parentPost_ID != null){
		//using function of the class Post
		$query = $post->createInsertQuery();
		$conn->query($query);
	} else {
		//using function of the class Post
		$query = $post->createInsertQueryNoParentPost_ID();
		$conn->query($query);
	}
?>

<!-- redirects using js -->
<script>
	location.href = "index.php";
</script>
