<?php
	include "../login/loggedIn.php";
	session_start();
	loggedIn();
?>
<html>
<head>
	<meta charset = "UTF-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../bootstrap.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<title> Group & Students </title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only"> Toggle Navigation </span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span class="navbar-brand"> GC06 </span>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="index.php">Students</a>
					</li>
					<li class="active">
						<a href="groups.php">Groups</a>
					</li>
                    <li>
						<a href="../login/logout.php">Sign out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<main>
<br>
<br>
<br>
<div class="container">
	<div class="container">
        <h1>Database Project: Groups</h1>
    </div>
<table class="table">
	<tr>
		<td><b> Group ID </b></td>
		<td><b> Student 1 </b></td>
		<td><b> Student 2 </b></td>
		<td><b> Student 3 </b></td>
		<td><b> Actions </b></td>
	</tr>
<!--RETRIEVING GROUPS LIST-->
<?php
	include "../dbConnect.php";

	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

	//Retrieving GROUPS list
	$whichGroupQuery = "SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID";
	$showResult = $conn->query($whichGroupQuery);
	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		$groupsArray[] = $row;
	}
	$currGroup = 0;
	foreach($groupsArray as $group){
		$counter = 0;
		if ($currGroup == 0){
			echo "<tr>";
			echo "<td>".$group['groupID']."</td>";
			echo "<td>".$group['email']."</td>";
			$counter++;
			$currGroup++;
		} elseif ($group['groupID']==$currGroup){
			echo "<td>".$group['email']."</td>";
			$counter++;
		} else {
			echo "</tr>";
			$counter = 0;
			//while($currGroup != $group['groupID']){
				$currGroup++;
			//}
			echo "<tr>";
			echo "<td>".$group['groupID']."</td>";
			echo "<td>".$group['email']."</td>";
			$counter++;
		}
	}

?>
</tr>
</table>
</div>


</main>


</body>


</html>