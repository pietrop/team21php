<?php
	include "../dbConnect.php";
	session_start();
	//****DATABASE CONNECTION****
	$conn = connectToDb();
	$conn->select_db("team21");
	//****END OF CONNECTION PROCEDURE****
	
	#Making sure that email and password fields are filled
	if (isset($_POST['email']) and isset($_POST['password'])){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = md5($_POST['password']); //PHP hashing is used
		
		if (isset($_POST['admin'])){
			$admin = 1;	
		} else {
			$admin = 0;	
		}
		
		
		
		if ($admin == 1){ //IF ADMIN LOGIN ATTEMPTED
		
			$query = "SELECT * FROM admins WHERE email='$email' and password='$password'";	
			$result = $conn->query($query);
			if (mysqli_num_rows($result) == 1) {
				
				$row = $result->fetch_array(MYSQLI_ASSOC);
				if (!isset($_SESSION['email'])){
					$_SESSION['email'] = $row['email'];
				} 
				if (!isset($_SESSION['firstName'])){
					$_SESSION['firstName'] = $row['firstName'];
				} 
				if (!isset($_SESSION['lastName'])){
					$_SESSION['lastName'] = $row['lastName'];
				}
				if (!isset($_SESSION['admin'])){
					$_SESSION['admin'] = $admin;	
				}
				
				$nextPageUrl = '../groupstudent/index.php';
			} else {
				$nextPageUrl = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'?invalid=1';
			}
			
		} else { //IF GENERAL LOGIN ATTEMTED
		
			$query = "SELECT * from students as s JOIN groups as g WHERE s.email='$email' and s.password='$password' 
			and g.student_ID='$email'";
			$result = $conn->query($query);
			if (mysqli_num_rows($result) == 1) {
				session_start();
				$row = $result->fetch_array(MYSQLI_ASSOC);
				if (!isset($_SESSION['email'])){
					$_SESSION['email'] = $row['email'];
				} 
				if (!isset($_SESSION['firstName'])){
					$_SESSION['firstName'] = $row['firstName'];
				} 
				if (!isset($_SESSION['lastName'])){
					$_SESSION['lastName'] = $row['lastName'];
				} 
				if (!isset($_SESSION['group'])){
					$_SESSION['group'] = $row['groupID'];	
				}
				if (!isset($_SESSION['admin'])){
					$_SESSION['admin'] = $admin;	
				}
				
				$nextPageUrl = '../homePage/index.php';
			} else {
				$nextPageUrl = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'?invalid=1';
			}
		}
	} else {
		$nextPageUrl = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'?invalid=1';
	}
?>
	<script>
		location.href = "<?php echo $nextPageUrl; ?>";
	</script>