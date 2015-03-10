
    <?php
      include "report.php";
      //reportID  groupID
      $report = new report(31, 31, $_POST['abstract'], $_POST['review1'], $_POST['review2']);

      $abstract = $report->getAbstract();
      echo $abstract;

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
      	$query = $report->createInsertQuery();
      	$conn->query($query);
        //$result = $conn->query(
        // "INSERT INTO `team21`.`reports` (`reportID`, `group_ID`, `abstract`, `review1`, `review2`) 
        // VALUES ('2', '2', 'Abstract test', 'Review 1 test', 'Review 2 test')"
         // );
        //$row = mysql_fetch_array($result);
        //print_r($row);
      
      ?>

      <script>
		       location.href = "showReport.php";
	     </script>