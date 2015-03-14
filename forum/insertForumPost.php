<?php
include "../navbar/navbar.php";

//Database related information
$hostname="127.0.0.1";
$user="root";
$password="root";

// $conn = new mysqli($hostname,$user,$password);$post = $_POST['post'];
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// } else {
// echo "Connection successful<br>";
// }

$myDB = $conn->select_db("team21");

$topic = $_GET['topic'];
$group = $_SESSION['group'];
$student = $_SESSION['email'];
$query = 'INSERT INTO forummod (`group_ID`, `topic`, `post`, `student_ID`) VALUES ($group , $topic , $post , $student);';
$conn->query($query);
?>

	<!-- redirects using js -->
      <script>
           location.href = "displayPostsFromTopic.php?topic=firstTopic";
  </script>
