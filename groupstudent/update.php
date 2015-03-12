<html>
<body>
	
    
	<header role="banner">
    </header>
	<main role='main'>
    	<article>
            <h1> Update Fields </h1>
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="updateAction.php" method="post">
                  	<input id="email" type="text" name="email" placeholder="E-mail" spellcheck="false" value = "<?php echo $_GET['email']?>">
                  	<br>
                    <input id="firstName" type="text" name="firstName" placeholder="First Name" value = "<?php echo $_GET['firstName']?>">
                    <br>
                    <input id="lastName" type="text" name="lastName" placeholder="Last Name" value = "<?php echo $_GET['lastName']?>">
                    <br>
                    <b>Group</b>
                    <select name="group">
                        <?php
                            include "../dbConnect.php";

                            //****DATABASE CONNECTION
                            $conn = connectToDb();
                            $conn->select_db("team21");
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
                                if ($_GET['group'] == $group['groupID']){
                                    echo "<option value=\"".$_GET['group']."\" selected>".$group['groupID']."</option>";
                                } elseif ($group['count'] != 3){
                                    echo "<option value=\"".$group['groupID']."\">".$group['groupID']."</option>";
                                }
                                $finalGroup = $group['groupID'];
                            }
                            $finalGroup++;
                            echo "<option value=\"".$finalGroup."\">".$finalGroup."</option>";
                            
                        ?>
                    </select>
                    <br>
                    <input type="hidden" name="prevEmail" value="<?php echo $_GET['email']?>">
                    <input type="hidden" name="prevGroup" value="<?php echo $_GET['group']?>">
                    <input id="loginbtn" type="submit" value="Update">
              </form>
            </div>
        </article>
    </main>
    
    
    
<?php
 include "../navbar/footer.php";
?>
