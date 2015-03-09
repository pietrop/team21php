<?php
 include "../navbar/navbar.php";
?>
	<h1>Your assigned peer assessments</h1>
	<br>
	<form role ="form" action="../report/showReport.php" method="post">            
      	<div class='form-group'>
		<b>Select the report to assess</b>
		<select id="report" name="report" placeholder = "groupID" >
			<?php
				$query = sprintf("SELECT `report_ID`, 'assessmentID' FROM `groupreportassessment` WHERE group_ID='%s'",mysql_real_escape_string($_SESSION['group']));
			    $showResult = $conn->query($query);
			    print_r($showResult);
				while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
					$reports[] = $row;
				}
				//Show reports in select
				foreach($reports as $report){
					echo "<option value=\"".$report['report_ID']."\">".$report['report_ID']."</option>";
				}
			?>
		</select>
		<div class="clearer"></div>
		</div>
		<button type="submit" class="btn btn-default">Make a peer review</button>
	</form>
<?php
 include "../navbar/footer.php";
?>

