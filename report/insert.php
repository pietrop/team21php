<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add new Report</title>

</head>

<body>
	
    
	<header role="banner">
    </header>
	<main role='main'>
    	<article>
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="indexReport.php" method="post">
                
                    <br>
                     <input id="abstract" type="text" name="abstract" placeholder="abstract">
                    <br>
                    <input id="review1" type="text" name="review1" placeholder="review1">
                    <br>
                     <input id="review2" type="text" name="review2" placeholder="review2">
                    <br>

                    <?php
                      include "report.php";
                      //reportID  groupID
                      $report = new report(1, 1, $_POST['abstract'], $_POST['review1'], $_POST['review2']);

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
                      if (($query = $report->createInsertQuery()) != null){
                        $result = $conn->query(
                         "INSERT INTO `team21`.`reports` (`reportID`, `group_ID`, `abstract`, `review1`, `review2`) VALUES ('1', '1', 'Abstract', 'Review 1', 'Review 2')"
                          );
                        //$row = mysql_fetch_array($result);
                        //print_r($row);
                      }
                      ?>
                    <div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add">
              </form>
            </div>
        </article>
    </main>
    
    
    
</body>
</html>