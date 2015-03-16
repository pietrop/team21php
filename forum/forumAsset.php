<?php
	include "../navbar/navbar.php";
	//$query = "SELECT * FROM forum WHERE student_ID='".$_SESSION['email']."' ORDER BY parentPost_ID, postID";
	$query = "SELECT * FROM forum ORDER BY parentPost_ID, postID";
	$result = $conn->query($query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
		if ($row['parentPost_ID'] == NULL){
			$rootArray[] = $row;	
		} else {
			$children[] = $row; 

		}
	}
	
	// print_r($children);	
?>
<!-- <a href="postAction.php"class="btn btn-primary">add a post</a> -->
 <div class='login-forms'>
  <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
    <form action="postAction.php" method="post">
        <br>
         <input id="student_ID" type="hidden" name="student_ID" placeholder="student_ID" value="<?php echo  $studentN ?>"  class="form-control" rows="3">
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
		echo '<div class="media-left">';
		echo '<a href="">';
		echo '<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEzLjIyNjU2MjUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="width: 64px; height: 64px;">';
		echo '</a>';
		echo '</div>';
		echo '<div class="media-body">';
		echo '<small class="media-hedding"><strong> '.$smallArray['student_ID'].' </strong></small><br>';
		echo '<p>'.$smallArray['post'].'</p>';
		$currPostID = $smallArray['postID'];
		
		while ($children[$counter]['parentPost_ID']==$currPostID){
			echo '<div class="media">';
			echo '<div class="media-left">';
			echo '<a href="">';
			echo '<img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEzLjIyNjU2MjUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="width: 64px; height: 64px;">';
			echo '</a>';
			echo '</div>';
			echo '<div class="media-body">';
			echo '<small class="media-hedding"><strong>'. $children[$counter]['student_ID'].'</strong></small><br>';
			echo ($children[$counter]['post']);
			$currPostID = $children[$counter]['postID'];
			$counter++;
		}
		for ($i=0;$i<$counter;$i++){
			echo '</div>';	
			echo '</div';
		}
		echo '</div>';
		echo '</li>';
	} 
?>
</ul>

<?php
	include "../navbar/footer.php";
?>