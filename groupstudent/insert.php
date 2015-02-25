<html>
<body>
	
    
	<header role="banner">
    </header>
	<main role='main'>
    	<article>
            <h1> Add new Student </h1>
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="insertAction.php" method="post">
                  	<input id="email" type="text" name="email" placeholder="E-mail" spellcheck="false" >
                  	<br>
                    <input id="firstName" type="text" name="firstName" placeholder="First Name">
                    <br>
                    <input id="lastName" type="text" name="lastName" placeholder="Last Name">
                    <br>
                    <b>Group</b>
                    <select name="group">
                        <?php
                            
                            //****DATABASE CONNECTION
                            $hostname="127.0.0.1";
                            $user="root";
                            $password="root";

                            $conn = new mysqli($hostname,$user,$password);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } else {
                                //echo "Connection successful<br>";
                            }
                            $myDB = $conn->select_db("team21");
                            //****END OF CONNECTION PROCEDURE****
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
                    <br>
                    <input id="loginbtn" type="submit" value="Add">
              </form>
            </div>
        </article>
    </main>
    
    
    
</body>
</html>
<?php?>