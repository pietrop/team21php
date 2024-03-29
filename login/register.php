<?php
	include "../dbConnect.php";
	 //****DATABASE CONNECTION
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Peer Review System – Registration</title>
        <link rel="stylesheet" href="../bootstrap.css">
    </head>

    <body>
        <div class="container">
            <header class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center">Peer Review System – Registration</h1>
                    </div>
                </div>
            </header>
        </div>
        <div class="container">
            <div class="jumbotron">
                <form class="form-horizontal" action="../groupstudent/insertAction.php" method="post">
                    <div class="form-group">
                        <label for="firstName" class="col-sm-2 control-label"> First Name: </label>
                        <div class="col-sm-10">
                            <input id="email" type="text" name="firstName" placeholder="First Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="col-sm-2 control-label"> Last Name: </label>
                        <div class="col-sm-10">
                            <input id="lastName" type="text" name="lastName" placeholder="Last Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label"> Email: </label>
                        <div class="col-sm-10">
                            <input id="email" type="email" name="email" placeholder="Enter your E-mail" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label"> Password: </label>
                        <div class="col-sm-10">
                            <input id="password" type="password" name="password" placeholder="Enter your password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group" class="col-sm-2 control-label"> Group: </label>
                        <div class="col-sm-10">
                    <select name="group" id="group" class="form-control">
                        <?php
                            
                            //QUERY TO DETERMINE AVAILABLE GROUPS
                            $query = "SELECT `groupID`, COUNT(`student_ID`) as count FROM `groups` GROUP BY `groupID`";
                            $showResult = $conn->query($query);
                            while ($row = $showResult->fetch_array(MYSQLI_ASSOC)){
                                $groupsArray[] = $row;
                            }
                            //Final Group variable is requried to create a new group
                            $finalGroup = 0;
                            foreach($groupsArray as $group){
                                if ($group['count'] != 3){
                                    echo "<option value=\"".$group['groupID']."\">".$group['groupID']."</option>";
                                }
                                $finalGroup = $group['groupID'];
                            }
                            $finalGroup++;
                            echo "<option value=\"".$finalGroup."\">".$finalGroup."</option>";
                            
                        ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="submit" class="btn btn-primary"> Register </button>
                        </div>
                        <div class="col-sm-1">
                            <a href="index.php"><button type="button" class="btn btn-danger"> Cancel </button></a>
                        </div>
                    </div>
              </form>
              <?php
                    if (isset($_GET['invalid'])){
                        echo '<div class="container">';
                        echo '<p class="text-center text-danger"> Please enter valid email address</p>';
                        echo '</div>';	
                    }
                ?>
            </div>
        </div>
    </body>
</html>