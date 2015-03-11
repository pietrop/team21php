<div class="form-group">
    <input type="search" class="form-control" name="search" id="search" <?php if(isset($_POST['search'])){
     echo 'value="'.$_POST['search'].'"';	
    } ?> placeholder = "Search">
</div>
<div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary">Search</button>
</div>
<?php 
	if(isset($_POST['submit']) && $_POST['search'] != ''){
?>
<div class="form-group">
    <a href="index.php"><button type="button" class="btn btn-default">Reset</button></a>
</div>
<?php	
}
?>