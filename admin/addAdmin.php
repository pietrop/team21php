<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add new admin</title>

</head>

<body>
	
    
	<header role="banner">
    </header>
	<main role='main'>
    	<article>
            <div class='login-forms'>
              <!--IP ADDRESS SHOULD BE CHANGED ON THE NEXT LINE-->
                <form action="indexAdmin.php" method="post">
                  	<input id="email" type="text" name="email" placeholder="E-mail" spellcheck="false">
                  	<br>
                    <input id="firstName" type="text" name="firstName" placeholder="First Name">
                    <br>
                    <input id="lastName" type="text" name="lastName" placeholder="Last Name">
                    <br>
                    <input id="password" type="password" name="password" placeholder="Password">
                    <br>
                    <div class="clearer"></div>
                    <input id="loginbtn" type="submit" value="Add">
              </form>
            </div>
        </article>
    </main>
    
    
    
</body>
</html>