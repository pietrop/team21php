<?php
include "../navbar/navbar.php";
$query = "SELECT * FROM `groups` as g INNER JOIN students as s WHERE g.groupID = ".$_SESSION['group']." and g.student_ID = s.email";
$result = $conn->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
	$groupDetails[] = $row;
}
?>
<div class="container">
	<h1 class="text-center">Group <?php echo $_SESSION['group']?></h1>	
</div>
<table class="table">
	<?php
		foreach($groupDetails as $member){
			if ($member['email'] == $_SESSION['email']){
				echo '<tr class="info">';
			} else {
				echo '<tr>';	
			}
			echo '<td>'.$member['firstName'].'</td>';
			echo '<td>'.$member['lastName'].'</td>';
			echo '<td>'.$member['email'].'</td></tr>';
		}	
	?>
</table>
<?php
include "../navbar/footer.php";
?>