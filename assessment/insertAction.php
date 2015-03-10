 <?php
      include "assessment.php";
      //assessment
       $assessment = new assessment($_POST['assessmentID'], $_POST['criteria'], $_POST['mark'], $_POST['comment']);
         // echo $assessment->getCriteria();
       print_r($assessment);

  

     
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
      	$query = $assessment->createInsertQuery();
      	$conn->query($query);


      	
 ?>

	<!-- redirects using js -->
      <script>
           location.href = "../report/myReportsToAssess.php";
  </script>
