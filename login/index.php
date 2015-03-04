<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="../bootstrap.css">
</head>

<body>
<div class="container">
	<header class="page-header">
    	<div class="row">
        	<div class="col-lg-12">
            	<h1 class="text-center"> GC06 </h1>
            </div>
        </div>
    </header>
</div>
<div class="container">
	<div class="jumbotron">
    	<form class="form-horizontal" action="loginVerification.php" method="post">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label"> E-mail: </label>
                <div class="col-sm-10">
                	<input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label"> Password: </label>
                <div class="col-sm-10">
                	<input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-offset-2 col-sm-10">
                	<div class="checkbox">
                    	<label>
                        	<input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-offset-2 col-sm-1">
                	<button type="submit" class="btn btn-primary"> Sign in </button>
                </div>
                <div class="col-sm-1">
                	<a href="../groupstudent/insert.php"><button type="button" class="btn btn-default"> Register </button></a>
                </div>
            </div>
        </form>
        <?php
			if (isset($_GET['invalid'])){
				echo '<div class="container">';
				echo '<p class="text-center text-danger"> Invalid email or password, please try again </p>';
				echo '</div>';	
			}
		?>
    </div>
</div>

</body>
</html>