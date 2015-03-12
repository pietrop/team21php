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
		echo '<table class="table table-hover">';
		echo '<thead>';
		echo '<th>Group</th>';
		echo '<th>Student 1</th>';
		echo '<th>Student 2</th>';
		echo '<th>Student 3</th>';
		echo '</thead>';
		echo '<tbody>';
		
		$currGroup = 0;
		$trTagOpen = false;
		for($i=0;$i<count($array);$i++){
			$groupID = $array[$i]['groupID'];
			$email = $array[$i]['email'];
			if ($groupID != null){
				$counter = 0;
				if ($groupID != $currGroup){
					if($trTagOpen){
						while ($counter != 2){
							echo "<td></td>";
							$counter++;	
						}
						echo "</tr>";
						$trTagOpen = false;	
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
				}
			}
		}
		while ($counter != 2){
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
?>