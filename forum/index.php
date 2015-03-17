<?php
	include "../navbar/navbar.php";
	//Admin should be able to see all the posts while students only those that are relevant to their group
	if ($_SESSION['admin'] == 1){
		$query = "SELECT * FROM forum ORDER BY parentPost_ID, postID";
	} else {
		$query = "SELECT f.postID, f.student_ID, f.parentPost_ID, f.post FROM `Forum` f LEFT JOIN groups g ON g.student_ID = f.student_ID LEFT JOIN admins a ON a.email = f.student_ID WHERE g.groupID = ".$_SESSION['group']." OR f.student_ID = a.email ORDER BY parentPost_ID, postID";	
	}
	$result = $conn->query($query);
	//Processing result from the query
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		if ($row['parentPost_ID'] == NULL){
			//Storing root posts in a separate array for further processing
			$rootArray[] = $row;	
		}
		//Array of all the posts
		$postArray[] = $row;
	}
	
?>

<h3> Forum </h3>
<!--Search form-->
<form class="form-inline" action="index.php" method="post">
	<?php include "../search/searchForm.php"; 
		if($_SESSION['admin'] == 0){
	?>
    <input type="hidden" name="group" value="<?php echo $_SESSION['group'];?>">
    <?php 
		}
        if(isset($_POST['submit']) && $_POST['search'] != ''){
    ?>
    <div class="form-group">
        <a href="index.php"><button type="button" class="btn btn-default">Reset</button></a>
    </div>
    <?php	
    	}
    ?>
</form>
<?php
	//Processing search
	if (isset($_POST) && $_POST['search']!=""){
		include "../search/search.php";
		if (!isset($_POST['group'])){
			$searchResult = searchForum($_POST['search'],$_POST['searchFor'],$conn, null);
		} else {
			$searchResult = searchForum($_POST['search'],$_POST['searchFor'],$conn, $_POST['group']);
		}
		if (count($searchResult)>0){
			foreach($searchResult as $array){
				echo '<!--Displaying search results-->';
				echo '<div class="container well">';
				echo '<div class="row">';
				echo '<strong>'.$array['postID'].'&nbsp;&nbsp; </strong>';
				echo '<i>'.$array['student_ID'].'</i>';
				echo '</div>';
				echo '<br>';	
				echo '<div class="row">';
				echo '<p>'.$array['post'].'</p>';
				echo '</div>';
				echo '</div>';
			}
		} else {
			echo '<br><br><strong> No results </strong>';	
		}
	} else {
?>
<h4> Add new post </h4> 
 <div class="container well">
  <!--New Post Form-->
    <form action="postAction.php" method="post">
        <br>
         <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID" value="<?php echo  $_SESSION['email'] ?>"  class="form-control" rows="3">
         <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo NULL ?>"  class="form-control" rows="3">
         <textarea id="post" name="post" placeholder="Type something here..."  class="form-control" rows="3"></textarea>
        <br>                
        <input type="submit" value="post" class="btn btn-success">
  </form>
</div>
<!--Displaying forum posts-->
<div class="container">
	<ul class="media-list well">
	<?php
        if (count($rootArray)>0){ //making sure that there are post to display
            foreach($rootArray as $smallArray){
                echo '<li class="media">';
                openningTags($smallArray);
                printPostID($postArray, $smallArray, 0);
                closingTags();
                echo '</li>';
            }
        } else {
			echo '<li class="media">No Posts to display</li>';	
		}
    ?>
	</ul>
</div>
<?php
	}
?>
<?php	
	//Recursive function that indents child posts making sure that "depth is taken into account
	//$array – array of all the posts
	//$postID – post that is being reviewed for children
	//$depth – "depth" of the current post (required for accurate display)	
	function printPostID($array, $postID, $depth){
		//Looping through the post array to identify children
		for ($i=0;$i<count($array);$i++){
			//If there are children echo relevant HTML tags and recursively call the function
			if ($postID['postID'] == $array[$i]['parentPost_ID']){
				echo '<div class="media">';
				openningTags($array[$i]); //echoing relevant HTML tags
				printPostID($array, $array[$i], $depth+1); //recursive call, incrementing "depth"
				closingTags(); //echoing relevant HTML tags
				echo '</div>';
			}
		}
	}
	function openningTags($smallArray){
		echo '<div class="media-left">';
		echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>';
		echo '</div>';
		echo '<div class="media-body">';
		echo '<small class="media-hedding"><strong>'.$smallArray['postID'].'</strong>&nbsp;&nbsp; <i>'.$smallArray['student_ID'].'</i> </small><br>';
		echo '<p>'.$smallArray['post'].'</p>';
		echo '<div class="collapse" id="collapse'.$smallArray['postID'].'">';
		?>
        <!--Reply to post <?php echo $smallArray['postID']?>-->
        <form action="postAction.php" method="post">
            <br>
             <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID" value="<?php echo  $_SESSION['email'] ?>"  class="form-control" rows="3">
             <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo $smallArray['postID'] ?>"  class="form-control" rows="3">
             <textarea id="post" type="text" name="post" placeholder="Type something here..."  class="form-control" rows="2"></textarea>
            <br>                
            <input id="loginbtn" type="submit" value="post" class="btn btn-primary btn-xs">
      </form>
		<?php
		echo '</div>';
		echo '<a data-toggle="collapse" href="#collapse'.$smallArray['postID'].'" aria-expanded="false" aria-controls="collapse'.$smallArray['postID'].'" 
		class="btn btn-success btn-xs">Reply</a>';
	}
	function closingTags(){
		echo '</div>';	
	}

	include "../navbar/footer.php";
?>