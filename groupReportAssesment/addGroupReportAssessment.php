<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add new assessment</title>

</head>

<body >
	<header role="banner">
    </header>
	<main role='main'>
    	<article>
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="indexGroupReportAssessment.php" method="post">

<!--             	    MyGroup: <br />
				    <select name="group">
						<option value="1">Group1</option>
						<option value="2">Group2</option>
				  		<option value="3">Group3</option>
				  		<option value="4">Group4</option>
				    </select><br />
				    <select name="report">
						<option value="1">Report1</option>
						<option value="2">Report2</option>
				  		<option value="3">Report3</option>
				  		<option value="4">Report4</option>
				    </select><br />
 -->                    
                  	<input id="group" type="text" name="group" placeholder="groupID" spellcheck="false">
                  	<br>
                    <input id="report" type="text" name="report" placeholder="reportID">
                    <br>
					<div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add">
              </form>
            </div>
        </article>
    </main>

</body>
</html>
