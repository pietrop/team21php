  <?php
include "../navbar/navbar.php";
   ?>
<!-- <form action="uploadAction.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" size="50">
    <input type="submit" value="Upload File" name="submit">
</form>
 -->

<form action="uploadAction.php" method="post"enctype="multipart/form-data">
<input type="file" name="file"/>
<br />
<input type="submit" value="Upload File" />
</form>

</body>
</html>