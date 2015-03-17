<?php
/**
*	Logout functionality implemented as in Dr. Graham Roberts lecture slides
*	"COMP013/GC06  Cookies and Sessions" slide 18
**/
	session_start();
	if (isset($_SESSION['email'])){
		$_SESSION = array();	
		if (isset($_COOKIE[session_name()])){
			setcookie(session_name(), '',time()-3600); //destroying cookie	
		}
		session_destroy(); //destroing session
	}
	$nextPageUrl = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
?>
	<script>
		location.href="<?php echo $nextPageUrl;?>";
	</script>