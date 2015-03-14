<?php
	include "../dbConnect.php";

	//****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****

		//*************POPULATE FORUM-MOD***************
		$sql = "DROP TABLE forummod";
		$conn->query($sql);
		$sql = "CREATE TABLE forummod ( postID int(11) not null AUTO_INCREMENT , group_ID int(11),topic varchar(11) not null, post text not null, student_ID varchar(11) not null, PRIMARY KEY (postID));";	
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('1','firstTopic','post number 1', 'averageStudent@me.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('1','firstTopic','post number 2', 'bestStudent@me.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('1','secondTopic','post number 1 topic 2', 'averageStudent@me.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('1','secondTopic','post number 2 topic 2', 'bestStudent@me.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('1','secondTopic','post number 3 topic 2', 'a@b.com')";
		$conn->query($sql);

		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('2','firstTopic group 2','post number 1 group 2', 'gmail@gmail.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('2','firstTopic group 2','post number 2 group 2', 'example@me.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('2','secondTopic group 2','post number 1 topic 2 group 2', 'gmail@gmail.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('2','secondTopic group 2','post number 2 topic 2 group 2', 'gmail@gmail.com')";
		$conn->query($sql);
		$sql = "INSERT INTO `forummod` (`group_ID`, `topic`, `post`, `student_ID`) VALUES ('2','secondTopic group 2','post number 3 topic 2 group 2', 'example@me.com')";
		$conn->query($sql);

		//*************END OF POPULATING FORUM-MOD*************
?>
