<?php
    include "../navbar/navbar.php";
?>
    	<article>
            <h1> Update Fields </h1>
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form class="form-horizontal"  action="updateAction.php" method="post">
                    <label for="email" class=" control-label"> Email: </label>
                  	<input id="email" type="text" name="email" placeholder="E-mail" spellcheck="false" value = "<?php echo $_GET['email']?>" class="form-control">
                  	<br>
                    <label for="email" class=" control-label"> First name: </label>
                    <input id="firstName" type="text" name="firstName" placeholder="First Name" value = "<?php echo $_GET['firstName']?>" class="form-control">
                    <br>
                    <label for="email" class=" control-label"> Last name: </label>
                    <input id="lastName" type="text" name="lastName" placeholder="Last Name" value = "<?php echo $_GET['lastName']?>" class="form-control">
                    <br>
                       <label for="email" class=" control-label"> Group: </label>
                    <select name="group" class="form-control">
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
                    <input id="loginbtn" type="submit" value="Update"class="btn btn-primary">
              </form>
            </div>
        </article>
    </main>
    
    
    
<?php
 include "../navbar/footer.php";
?>
