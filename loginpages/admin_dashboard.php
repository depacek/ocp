<?php
$title="dasboard";
require_once "header1.php";
require_once "object.php";
$a=$admin->list();
$s=$student->list();
$sa=$student->listactive();
$t=$teacher->list();
$ta=$teacher->listactive();
// print_r($a);

?>
<div class="row">
			<div class="col">
				<div class="form-control btn btn-success">
					<h3>Total no of Admin : <button class="btn btn-primary"><?php echo count($a); ?></h3>
				</div>
				<br>
				<div class="form-control btn btn-primary hello">
					<h3>Total no of Students : <button class="btn btn-warning"><?php echo count($s); ?></button></h3>
					<h3 class="slider">  &nbsp; &nbsp; &nbsp; &nbsp; Active Students : <button class="btn btn-success"><?php echo count($sa); ?></button>  </h3>  <h3>&nbsp; De active Students : <button class="btn btn-danger"><?php echo count($s)-count($sa); ?></button></h3>
				</div>
				<div class="form-control btn btn-info hello">
					<h2>Total no of Teachers : <button class="btn btn-warning"><?php echo count($t); ?></h2>
					<h2 class="slider"> &nbsp; &nbsp; &nbsp; &nbsp; Active Teachers : <button class="btn btn-success"><?php echo count($ta); ?></h2>
					<h2>&nbsp; &nbsp;De active Teachers : <button class="btn btn-danger"><?php echo count($t)-count($ta); ?></h2>
				</div>
			</div>
			
            
            </div>
       

<?php require_once"footer.php"; ?>