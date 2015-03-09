<?php
include "../navbar/navbar.php";
?>
<main>
	<h1>You're not allowed to see this page</h1>
    <a onClick="goBack()"> Go back </a>
    
    <script>
	function goBack(){
		window.history.back();	
	}
	</script>
</main>
<?php
include "../navbar/footer.php";
?>