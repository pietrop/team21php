<?php
	include "../dbConnect.php";

	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
	
	$sql = "TRUNCATE admins";
	$conn->query($sql);
	$sql = "TRUNCATE students";
	$conn->query($sql);
	$sql = "TRUNCATE groups";
	$conn->query($sql);
	$sql = "TRUNCATE reports";
	$conn->query($sql);
	$sql = "TRUNCATE groupreportassessment";
	$conn->query($sql);
	$sql = "TRUNCATE assessments";
	$conn->query($sql);
	


	//****Students INSERT query****
		$sql = "INSERT INTO `team21`.`students` (`email`, `firstName`, `lastName`, `password`) VALUES ('example@me.com', 'John', 'Appleseed', '".md5('appleTheBest')."'), ('a@b.com', 'A', 'B', '".md5('AB')."'), ('nurbakimovaset@mail.ru', 'Asset', 'Nurbakimov','".md5('myPass')."'), ('gmail@gmail.com', 'Google', 'Apple', '".md5('Password')."'), ('true@false.net', 'True', 'False', '".md5('False')."')";
	//****END OF QUERY*****
		$conn->query($sql);
	//****Another INSERT query
		$sql = "INSERT INTO `team21`.`students` (`email`, `firstName`, `lastName`, `password`) VALUES ('bestStudent@me.com', 'Best', 'Student', '".md5('pass')."'), ('worstStudent@me.com', 'Worst', 'Student', '".md5('pass')."'), ('averageStudent@me.com', 'Average', 'Student', '".md5('pass')."'), ('goodStudent@me.com', 'Good', 'Student', '".md5('pass')."'), ('poorStudent@me.com', 'Poor', 'Student', '".md5('pass')."');";
	//****END OF QUERY****
		$conn->query($sql);
	//****GROUP INSERTION QUERY****
		$sql = "INSERT INTO `team21`.`groups` (`groupID`, `student_ID`) VALUES ('1', 'a@b.com'), ('1', 'averageStudent@me.com'), ('1', 'bestStudent@me.com'), ('2', 'example@me.com'), ('2', 'gmail@gmail.com'), ('3', 'goodStudent@me.com'), ('4', 'nurbakimovaset@mail.ru'), ('4', 'poorStudent@me.com');";
	//****END OF QUERY

		$conn->query($sql);

	//****Query to make admin****
		$sql = "INSERT INTO `team21`.`admins` (`email`, `firstName`, `lastName`, `password`) VALUES ('admin@admin.com','Your','Mum','".md5('admin')."')";
	//****END OF QUERY****
		$conn->query($sql);

	//****resetting auto increment SQL counter in reports
		$sql = "ALTER TABLE 'groupreportassessment' AUTO_INCREMENT = 1";
		$conn->query($sql);
	//****END OF QUERY****
	//QUERY TO ADD GroupReportAssessments
		$sql = "INSERT INTO `team21`.`groupreportassessment` (`group_ID`, `report_ID`) VALUES (1,2), (1,3), (2,1), (2,4), (3,2), (3,4), (4,1), (4,3) ;";
		$conn->query($sql);
	//****END OF QUERY****

	//****resetting auto increment SQL counter in reports
		$sql = "ALTER TABLE 'reports' AUTO_INCREMENT = 1";
		$conn->query($sql);
		//Populating report for groups 1 to 4
		$sql = 'INSERT INTO `reports`(`group_ID`, `abstract`, `review1`, `review2`) VALUES (1,"ABSTRACT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua")';
		$conn->query($sql);
		$sql = 'INSERT INTO `reports`( `group_ID`, `abstract`, `review1`, `review2`) VALUES (2,"ABSTRACT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua")';
		$conn->query($sql);
		$sql = 'INSERT INTO `reports`(`group_ID`, `abstract`, `review1`, `review2`) VALUES (3,"ABSTRACT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua")';
		$conn->query($sql);
		$sql = 'INSERT INTO `reports`( `group_ID`, `abstract`, `review1`, `review2`) VALUES (4,"ABSTRACT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua","REVIEW2Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua")';
		$conn->query($sql);
    //****END OF QUERY****

	//SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID	
?>