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
        echo 'You are logged in as '.$_SESSION['username'];
        ?>.
    </h2>
    </div> <!-- row -->

    <div class="row">
      <div class="col-sm-9 ">
        <h1>Main Menu</h1>
          <h2><a href="../groupstudent/groups.php">Your group</a></h2>
          <h2><a href="../report/indexReport.php">Your report</a></h2>
          <h2><a href="../groupReportAssessment/addGroupReportAssessment.php">Make a peer assessment</a></h2>
          <button type="button" class="btn btn-default"><a href="../login/logout.php">Logout</a></button>

      </div> <!-- col-9 -->

      <div class="col-sm-3 ">

           <h2>Col 3</h2>
      </div> <!-- col-3 -->

      </div> <!-- row -->

  </div> <!-- container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>