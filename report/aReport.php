<?php
 include "../navbar/navbar.php";
?>



<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Group: #... Report: #...</h3>

  </div>
<!--   <div class="btn-group btn-group-justified">
  <a href="#" class="btn btn-default">Rate</a>
  <a href="#" class="btn btn-default">Comment</a>
</div>	
 -->
  <div class="panel-body">
  	<h4 class="list-group-item-heading">Abstract</h4>
   <p> Lore Ipsum</p>
  </div>
  <hr>
  <div class="panel-body">
  	  	<h4 class="list-group-item-heading">Review One</h4>
  <p> Lore Ipsum</p>
  </div>
  <hr>
   <div class="panel-body">
   	  	<h4 class="list-group-item-heading">Review Two</h4>
    <p> Lore Ipsum</p>
  </div>
</div>


<!--  -->

<form class="form-horizontal">
  <fieldset>
    <legend>Report Assesment</legend>
  
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Comment</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">Commnet on marking of report.</span>
      </div>
    </div>
    
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>



 <!-- </div> -->
</div>
<?php
 include "../navbar/footer.php";
?>