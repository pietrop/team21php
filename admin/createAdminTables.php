<?php	
	function createStudentTable($array){
		echo '<table class="table">';
		echo '<thead>';
		echo '<th>E-mail</th>';
		echo '<th>First Name</th>';
		echo '<th>Last Name</th>';
		echo '<th>Group</th>';
		echo '<th>Actions</th>';
		echo '</thead>';
		echo '<tbody>';
		
		foreach($array as $student){
			echo '<tr>';
				echo "<td>".$student['email']."</td>";
				echo "<td>".$student['firstName']."</td>";
				echo "<td>".$student['lastName']."</td>";
				echo "<td>".$student['groupID']."</td>";
				echo '<td><a href="update.php?email='.$student['email'].'&firstName='.$student['firstName'].'&lastName='.$student['lastName'].'&group='.$student['groupID'].'"> <span class="glyphicon glyphicon-pencil"></span> </a>&nbsp; &nbsp; <a href="delete.php?email='.$student['email'].'"> <span class="glyphicon glyphicon-minus"></span> </a>';
			echo '</tr>';	
		}
		
		echo '</tbody>';
		echo '</table>';
	}
	function createGroupTable($array){
		include "../report/rankingFunctions.php";
		echo '<table class="table table-hover">';
		echo '<thead>';
		echo '<th>Group</th>';
		echo '<th>Student 1</th>';
		echo '<th>Student 2</th>';
		echo '<th>Student 3</th>';
		echo '<th>Average Grade</th>';
		echo '</thead>';
		echo '<tbody>';
		
		$currGroup = 0;
		$trTagOpen = false;
		$counter = 0;
		for($i=0;$i<count($array);$i++){
			$groupID = $array[$i]['groupID'];
			$email = $array[$i]['email'];
			if ($groupID != null){
				if ($groupID != $currGroup){
					if($trTagOpen){
						while ($counter < 3){
							echo "<td></td>";
							$counter++;	
						}
						echo "<td>".averageMark($currGroup)."</td>";
						echo "</tr>";
						$trTagOpen = false;	
						$counter = 0;
					}
					$currGroup++;	
					$i--;
				} else {
					if(!$trTagOpen){
						echo "<tr>";	
						echo "<td>".$groupID."</td>";
						$trTagOpen = true;
					}
					echo "<td>".$email."</td>";
					$counter++;
				}
			}
		}
		while ($counter < 3){
			echo "<td></td>";
			$counter++;	
		}
		echo '</tr>';
		echo '</tbody>';
		echo '</table>';
	}
	
	function createReportTable($array){
		echo '<table class="table table-hover">';
		echo '<thead>';
		echo '<th>Group ID</th>';
		echo '<th>Abstract</th>';
		echo '<th>Review 1</th>';
		echo '<th>Review 2</th>';
		echo '</thead>';
		echo '<tbody>';	
		
		foreach($array as $report){
			echo '<tr>';
				echo "<td>".$report['group_ID']."</td>";
				echo "<td>".$report['abstract']."</td>";
				echo "<td>".$report['review1']."</td>";
				echo "<td>".$report['review2']."</td>";
			echo '</tr>';	
		}
		
		echo '</tr>';
		echo '</tbody>';
		echo '</table>';
	}
	function createRankedGroupTable($array){
		echo '<table class="table table-hover">';
		echo '<thead>';
		echo '<th>Rank</th>';
		echo '<th>Group ID</th>';
		echo '<th>Average Mark</th>';
		echo '</thead>';
		echo '<tbody>';	
		// for ($i=1; $i < sizeof($array); $i++) { 
		// 	# code...
		// 	echo '<tr>';
		// 	echo "<td>".$i."</td>";
		// 	echo "<td>".$array[$i]."</td>";
		// 	echo '</tr>';
		// }
		$i=1;
		foreach($array as $id => $mark){
			echo '<tr>';
			echo "<td>".$i."</td>";
			echo "<td>".$id."</td>";
			echo "<td>".$mark."</td>";
			echo '</tr>';	
			$i++;
		}

	}
?>