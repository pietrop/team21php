<?php
	include "../dbConnect.php";

	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

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

	//SELECT students.email, groups.groupID FROM `students` INNER JOIN groups WHERE students.email=groups.student_ID	
?>