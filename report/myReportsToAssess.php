<?php
include "../navbar/navbar.php";
?>
<main>

    <div class="container">
        <h1>My Assessments to Make</h1>
    <?php
		$query = "SELECT * FROM `groupreportassessment` AS g INNER JOIN reports AS r 
		WHERE g.report_ID = r.reportID AND g.group_ID =".$_SESSION['group']."";
		$result = $conn->query($query);
		while ($row = $result->fetch_array(MYSQLI_ASSOC)){
			$reports[] = $row;
		}
		$idCounter = 1;
		foreach($reports as $report){
			
			?>

   			<div class="container well">
                <div class="row">
                	<h2 class="col-sm-offset-1">Assessment #<?php echo $report['assessmentID']?></h2>
                </div>
                <div class="row">
                    <h3 class="col-sm-12 text-justify">Abstract</h3>
                    <p class="col-sm-12 text-justify"><?php echo $report['abstract']?></p>
                </div>
                <div class="collapse" id="collapse<?php echo $idCounter;?>">
                    <div class="row">
                         <h3 class="col-sm-12 text-justify">Review One</h3>
                        <p class="col-sm-12 text-justify"><?php echo $report['review1']?></p>
                    </div>
                    <div class="row">
                        <h3 class="col-sm-12 text-justify">Review Two</h3>
                        <p class="col-sm-12 text-justify"><?php echo $report['review2']?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <a data-toggle="collapse" href="#collapse<?php echo $idCounter;?>" aria-expanded="false"
                     aria-controls="collapse<?php echo $idCounter;?>" class="btn btn-success btn-sm">Expand text</a>
                    </div>
                    <div class="col-sm-2">
                    	
                        
                        <!--Link should be: ../assessment/insert.php?assessmentID=<?php echo $report['assessmentID']?>
                        -->

                     <a href="makeAssessment.php?assessmentID=<?php echo $report['assessmentID']?>" class="btn btn-primary btn-sm">Assess</a>  
                        
                    </div>
                </div>
			</div>
            <?php
			$idCounter++;
		}
	?>
    </div>
</main>
<?php
include "../navbar/footer.php";
?>