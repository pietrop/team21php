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
	
	
	$lorem= "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

// echo "ABSTRACT" . $lorem ;

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
		$sql = "INSERT INTO `team21`.`groupreportassessment` (`group_ID`, `report_ID`) VALUES (1,2), (1,3), (2,1), (2,4), (3,2), (3,4), (4,1), (4,3) ,(3,1);";
		$conn->query($sql);
	//****END OF QUERY****

	//****resetting auto increment SQL counter in reports
		$sql = "ALTER TABLE 'reports' AUTO_INCREMENT = 1";
		$conn->query($sql);
		//Populating report for groups 1 to 4
		$sql = "INSERT INTO `reports`(`group_ID`, `abstract`, `review1`, `review2`) VALUES (1, 'Abstract $lorem'  ,'Review1  $lorem', 'Review2  $lorem' )";
		echo $sql; 
		echo "<br><br>"; 
		$conn->query($sql);
		$sql = "INSERT INTO `reports`( `group_ID`, `abstract`, `review1`, `review2`) VALUES (2,'Abstract $lorem'  ,'Review1  $lorem', 'Review2  $lorem')";
		$conn->query($sql);
		echo $sql; 
		echo "<br><br>"; 
		$sql = "INSERT INTO `reports`(`group_ID`, `abstract`, `review1`, `review2`) VALUES (3,'Abstract $lorem'  ,'Review1  $lorem', 'Review2  $lorem')";
		$conn->query($sql);
		echo $sql; 
		echo "<br><br>";  
		$sql = "INSERT INTO `reports`( `group_ID`, `abstract`, `review1`, `review2`) VALUES (4,'Abstract $lorem'  ,'Review1  $lorem', 'Review2  $lorem')";
		$conn->query($sql);


    //****END OF QUERY****

	//populating assessments table.
		$sql = 'INSERT INTO `assessments` (`assessmentID`, `criteria`, `mark`, `comment`) VALUES (1, "Accuracy", 4, "this is a comment, 1"), (7, "Accuracy", 3, "this is a comment, 2"), (4, "Readibility", 5, "this is a comment, 3"), (6, "Readibility", 2, "this is a comment, 4"), (2, "Creativity", 5, "this is a comment, 5"), (9,"Creativity", 2, "this is a comment, 6") ;';
		$conn->query($sql);

	//SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID	


		//***********POPULATE FORUM ********************
		//with a mixture of posts from two groups to check one group can't see the posts of the other group.
		

		$sql = "DROP TABLE forum";
		$conn->query($sql);
		echo $sql; 
		$sql = "CREATE TABLE Forum ( postID int(11) not null AUTO_INCREMENT ,student_ID varchar(11) not null,parentPost_ID varchar(11),post text not null, PRIMARY KEY (postID));";	
		$conn->query($sql);
		echo $sql; 
		echo "<br><br>";  
		$sql = "INSERT INTO `forum`( `student_ID`,`post`) VALUES ('a@b.com','This is forum for user a@b.com')";
		$conn->query($sql);
		echo $sql; 
		echo "<br><br>";  
		$sql = "INSERT INTO `forum`( `student_ID`, `parentPost_ID`,`post`) VALUES ('a@b.com',1,'This is forum for user a@b.com')";
		$conn->query($sql);
		echo $sql; 
		echo "<br><br>";  
		$sql = "INSERT INTO `forum`( `student_ID`, `parentPost_ID`,`post`) VALUES ('a@b.com',2,'This is forum for user a@b.com')";
		echo $sql; 
		echo "<br><br>";  
		$conn->query($sql);
		$sql = "INSERT INTO `forum`( `student_ID`,`post`) VALUES ('bestStudent@me.com','This is forum for user a@b.com')";
		echo $sql; 
		echo "<br><br>";  
		$conn->query($sql);

		$sql = "INSERT INTO `forum`( `student_ID`,`parentPost_ID`,`post`) VALUES ('bestStudent@me.com',4,'This is forum for user a@b.com')";
		echo $sql; 
		echo "<br><br>";  
		$conn->query($sql);


		//****END OF QUERY****
		
		//ADDITIONAL QUERIES FOR DROPING AND CREATING NEW VIEWS
		$sql = "DROP VIEW studentsWithGroupID";
		echo $sql; 
		echo "<br><br>";  
		$conn->query($sql);
		$sql = "CREATE VIEW studentsWithGroupID AS SELECT email, firstName, lastName, groupID FROM students LEFT JOIN groups ON email = student_ID";
		echo $sql; 
		echo "<br><br>"; 
		$conn->query($sql);
		





		echo "script executed";
?>