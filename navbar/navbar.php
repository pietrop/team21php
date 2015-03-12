<?php
 include "../dbConnect.php";
 include "../login/loggedIn.php";
 session_start();
 if (!loggedIn()){
	include "../login/redirect.php";	 
 }
// $_SESSION['username'] = 'kjoshimail@gmail.com';
 //****DATABASE CONNECTION
$conn = connectToDb();
$conn->select_db("team21");
//****END OF CONNECTION PROCEDURE****

$admin = $_SESSION['admin'];

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
   
    
<!-- http://stackoverflow.com/questions/10336194/twitter-bootstrap-top-nav-bar-blocking-top-content-of-the-page -->
<!-- "navbar-static-top" prevents navbar from covering part of page when changing screensize -->
      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <?php
			  if ($admin == 0){?>
              	<a class="navbar-brand" href="../homePage/index.php">GC06 - Team 21</a>
              <?php
			  } else {?>
				 <a class="navbar-brand" href="#">GC06 - Team 21 (Admin)</a> 
              <?php
			  }
			  ?>
            </div>
      

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
              <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
               <!--  <li><a href="../groupstudent/index.php">Students</a></li>  -->
               <?php
			   if ($admin == 0){
				?>
                <li><a href="../myGroup/index.php">My Group</a></li>
                <li><a href="../report/indexMyReport.php">My Report</a></li>
                <li><a href="../report/myReportsToAssess.php">Make Assessment</a></li>
                <li><a href="../forum/index.php">Forum</a></li>
              <?php 
			  } else {  
			  ?>
              	<li><a href="../groupstudent/index.php">Students</a></li>
                <li><a href="../groupstudent/groups.php">Groups</a></li>
                <li><a href="../report/indexReportNew.php">Reports</a></li>
                <li><a href="../groupReportAssessment/showAssessments.php">Assign assessments</a></li>
                <!-- <li><a href="../forum/index.php">Forum</a></li> -->
              <?php 
			  }  
			  ?>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="../login/logout.php">Sign out</a></li>
                  </ul>
                </li>
              </ul>
            </div>
           </div>
        </nav>

        <div class="container">
          <!-- br used to avoid navbar overlapping with rest of page, there must be a better way to do it -->
          

<!-- Login notificaiton system -->
    <div class="row">
      <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
        <div class="alert alert-success" role="alert">Welcome to <strong>Team 21</strong> Peer Review System</div>
    <p class="text-primary"></p>
 
<div class="alert alert-info" role="alert">
      <?php
        echo 'You are logged in as <strong>'.$_SESSION['firstName'].' '.$_SESSION['lastName'].'</strong>';
        ?>.
  </div>
  </div> <!-- col -->
    </div> <!-- row -->

    <!-- follows rest of page where this is being included, however container is opened in navbar and closed in footer, in pages you just need to setup the rows and cols you want. -->