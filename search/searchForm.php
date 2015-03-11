<div class="form-group">
    <input type="search" class="form-control" name="search" id="search" <?php if(isset($_POST['search'])){
     echo 'value="'.$_POST['search'].'"';	
    } ?> placeholder = "Search">
</div>
<div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary">Search</button>
</div>
