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
		} else {
			$postArray['postID'] = $row['postID'];
			$postArray['student_ID'] = $row['student_ID'];
			$postArray['parentPost_ID'] = $row['parentPost_ID'];
			$postArray['post'] = $row['post'];
			$postArray['displayed'] = FALSE;
			$children[] = $postArray; 

		}
		$postArray[] = $row;
	}
	
	//print_r($children);	
?>
<!-- <a href="postAction.php"class="btn btn-primary">add a post</a> -->
 <div class="container">
  <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
    <form action="postAction.php" method="post">
        <br>
         <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID" value="<?php echo  $_SESSION['email'] ?>"  class="form-control" rows="3">
         <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo NULL ?>"  class="form-control" rows="3">
         <input id="post" type="text" name="post" placeholder="Type something here..."  class="form-control" rows="3">
        <br>                
        <input id="loginbtn" type="submit" value="post" class="btn btn-primary">
  </form>
</div>
<hr>
<ul class="media-list">

<?php
	$counter = 0;
	foreach($rootArray as $smallArray){
		echo '<li class="media">';
		openningTags($smallArray);
		$myArray[] = $arrayToAdd;
		$myArray[] = printPostID($postArray, $smallArray, 0);
		closingTags();
		echo '</li>';
		$counter++;
		
		
	}
	
	
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
		echo '<small class="media-hedding"><strong>'.$smallArray['postID'].' '.$smallArray['student_ID'].' </strong></small><br>';
		echo '<p>'.$smallArray['post'].'</p>';
		echo '<div class="collapse" id="collapse'.$smallArray['postID'].'">';
		?>
        <form action="postAction.php" method="post">
            <br>
             <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID" value="<?php echo  $_SESSION['email'] ?>"  class="form-control" rows="3">
             <input id="parentPost_ID" type="hidden" name="parentPost_ID" placeholder="parentPost_ID" value="<?php echo $smallArray['postID'] ?>"  class="form-control" rows="3">
             <input id="post" type="text" name="post" placeholder="Type something here..."  class="form-control" rows="3">
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
?>
</ul>
<?php	
	include "../navbar/footer.php";
?>