<?php
	include "../navbar/navbar.php";
	//$query = "SELECT * FROM forum WHERE student_ID='".$_SESSION['email']."' ORDER BY parentPost_ID, postID";
	if ($_SESSION['admin'] == 1){
		$query = "SELECT * FROM forum ORDER BY parentPost_ID, postID";
	} else {
		$query = "SELECT * FROM `Forum` f LEFT JOIN groups g ON g.student_ID = f.student_ID WHERE g.groupID = ".$_SESSION['group']." ORDER BY parentPost_ID, postID";	
	}
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		if ($row['parentPost_ID'] == NULL){
			$rootArray[] = $row;	
		}
		$postArray[] = $row;
	}
	
?>
<!-- <a href="postAction.php"class="btn btn-primary">add a post</a> -->
<h3> Forum </h3>
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
	if (isset($_POST) && $_POST['search']!=""){
		include "../search/search.php";
		if (!isset($_POST['group'])){
			$searchResult = searchForum($_POST['search'],$_POST['searchFor'],$conn, null);
		} else {
			$searchResult = searchForum($_POST['search'],$_POST['searchFor'],$conn, $_POST['group']);
		}
		if (count($searchResult)>0){
			foreach($searchResult as $array){
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
  <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
    <form action="postAction.php" method="post">
        <br>
         <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID" value="<?php echo  $_SESSION['email'] ?>"  class="form-control" rows="3">
         <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo NULL ?>"  class="form-control" rows="3">
         <textarea id="post" name="post" placeholder="Type something here..."  class="form-control" rows="3"></textarea>
        <br>                
        <input type="submit" value="post" class="btn btn-success">
  </form>
</div>
<div class="container">
<ul class="media-list well">

<?php
	$counter = 0;
	if (count($rootArray)>0){
		foreach($rootArray as $smallArray){
			echo '<li class="media">';
			openningTags($smallArray);
			printPostID($postArray, $smallArray, 0);
			closingTags();
			echo '</li>';
			$counter++;
		}
	}
?>
</ul>
</div>
<?php
	}
?>
<?php	
		
	function printPostID($array, $postID, $depth){
		for ($i=0;$i<count($array);$i++){
			if ($postID['postID'] == $array[$i]['parentPost_ID']){
				echo '<div class="media">';
				openningTags($array[$i]);
				printPostID($array, $array[$i], $depth+1);
				closingTags();
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