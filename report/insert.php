<?php
 include "../dbConnect.php";
 include "../login/loggedIn.php";
 session_start();
 loggedIn();
// $_SESSION['username'] = 'kjoshimail@gmail.com';
 //****DATABASE CONNECTION
$conn = connectToDb();
$conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peer Review System</title>

    <!-- Bootstrap -->
    <link href="../bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="container">

      <div class="row">
    <h1>Welcome to Team 21 Peer Review System</h1>
    <h2> 
      <?php
        echo 'You are logged in as '.$_SESSION['email'];
        ?>.
    </h2>
    </div> <!-- row -->
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
                      $report = new report(2, 2, $_POST['abstract'], $_POST['review1'], $_POST['review2']);

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
                         "INSERT INTO `team21`.`reports` (`reportID`, `group_ID`, `abstract`, `review1`, `review2`) VALUES ('2', '2', 'Abstract test', 'Review 1 test', 'Review 2 test')"
                          );
                        //$row = mysql_fetch_array($result);
                        //print_r($row);
                      }
                      ?>
                    <div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add">
              </form>
            </div>

  </div> <!-- container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
