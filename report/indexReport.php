<?php
 include "../dbConnect.php";
 include "../login/loggedIn.php";
 session_start();
 loggedIn();
// $_SESSION['username'] = 'kjoshimail@gmail.com';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peer Review System</title>

    <!-- Bootstrap -->
    <link href="../bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="container">

      <div class="row">
    <h1>Welcome to Team 21 Peer Review System</h1>
    <h2> 
      <?php
        echo 'You are logged in as '.$_SESSION['email'];
        ?>.
    </h2>
    </div> <!-- row -->
<main>
	<!--LIST OF STUDENTS FROM DATABASE-->
<table>
	<tr>
		<td><b> Report ID</b></td>
		<td><b> Group ID</b></td>
		<td><b> Abstract </b></td>
		<td><b> Review 1 </b></td>
		<td><b> Review 2 </b></td>	
	</tr>
<!--RETRIEVEING REPORT LIST FROM DATABASE-->

<?php

// $conn = new mysqli($hostname,$user,$password);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
// 	echo "DB Connection successful<br>";
// }
 //****DATABASE CONNECTION
$conn = connectToDb();
$conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****

//Retrieving students from DB and storing in an Array
$query = sprintf("SELECT * FROM reports");
	$showResult = $conn->query($query);
	while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
		$newReport = new Report($row['reportID'], $row['group_ID'], $row['abstract'], $row['review1'],$row['review2']);
		$reportsArray[] = $newReport;
	}
	//DETERMINING STUDENT's GORUP STATUS
	// $whichGroupQuery = "SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID";
	// $showResult = $conn->query($whichGroupQuery);
	// while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
	// 	$groupsArray[] = $row;
	// }
	// ADDING TO HTML TABLE

	foreach($reportsArray as $rep){
		$groupID = null;
		foreach($reportsArray as $group){
			if ($report['report']==$rep->getReportID()){
				$groupID = $group['groupID'];
				echo "1";
			}
		}
		echo "<tr>";
		echo "<td>".$rep->getReportID()."</td>";
		echo "<td>".$rep->getGroup_ID()."</td>";
		echo "<td>".$rep->getAbstract()."</td>";
		echo "<td>".$rep->getReview1()."</td>";
		echo "<td>".$rep->getReview2()."</td>";
		// echo '<td><a href="update.php?email='.$rep->getEmail().'&firstName='.$rep->getFirstName().'&lastName='.$rep->getLastName().'&group='.$groupID.'"> Update </a>&nbsp; &nbsp; <a href="delete.php?email='.$stud->getEmail().'"> Delete </a>';
		echo "</tr>";
	}
?>

</table>
<br>
<br>
<a href="insert.php"> Add new Report </a>
 </div> <!-- container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>