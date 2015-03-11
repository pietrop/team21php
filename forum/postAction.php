 <?php
      include "post.php";
      //assessment
      // $postID,$student_ID, $parentPost_ID, $post
      // print_r($_POST);
      // $post = Post::makeNewWithParameterA("foo");
      $post = new Post($_POST['student_ID'],$_POST['parentPost_ID'],$_POST['post']);
         // echo $assessment->getCriteria();
       print_r($post);

  

     
      //Database related information
      $hostname="127.0.0.1";
      $user="root";
      $password="root";

      $conn = new mysqli($hostname,$user,$password);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } else {
        echo "Connection successful<br>";
      }

      $myDB = $conn->select_db("team21");

      //$query = 'INSERT INTO admins(email, firstName, lastName, password) VALUES ("'.$email.'","b","c","d")';
      	$query = $post->createInsertQuery();
      	echo $query ;
      	print_r($query);
      	$conn->query($query);


      	
 ?>

	<!-- redirects using js -->
   