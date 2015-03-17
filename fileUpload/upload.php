<?php
	include "../navbar/navbar.php";
?>

<form action="uploadAction.php" method="post"enctype="multipart/form-data">
    <input type="file" name="file"/>
    <br />
    <input type="submit" value="Upload File" class="btn btn-primary btn-sm" />
</form>

<?php
	include "../navbar/footer.php";
?>