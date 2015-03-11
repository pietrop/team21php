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
		echo '<table class="table">';
		echo '<thead>';
		echo '<th>Group</th>';
		echo '<th>Student 1</th>';
		echo '<th>Student 2</th>';
		echo '<th>Student 3</th>';
		echo '</thead>';
		echo '<tbody>';	
	}
?>