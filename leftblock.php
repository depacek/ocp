<?php
require_once "loginpages/object.php";
$notices=$notice->listNotice();
// print_r($notices);
?>

<div class="row">
		<div class="col-md-3 header ">
			<div class="row">
				<div class="col-md">
					<h1>Login as: </h1>
				  <ul class=" last nav-tabs nav-link">	
						 
				    <div class="center"><li class="center">
				      <a class="nav-link" href="loginpages/admin.php">Admin</a>
				    </li>
				</div>
					 <div class="center"><li class="center">
				      <a class="nav-link" href="loginpages/teacher.php">Teacher</a>
				    </li>
				</div>
					<div class="center"><li class="center">
				      <a class="nav-link" href="loginpages/student.php">Student</a>
				    </li>
				</div>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md">
			 		<h1>Notices</h1>
				<ul class="last">
					<?php foreach ($notices as $ns) { ?>
					<li><a href="notice_detail.php?id=<?php echo $ns->id;?>"><?php echo $ns->title; ?></a></li>
				<?php } ?>
					<!-- <li><a href="#">Bsc CSIT-2074 Admission Notic 2074 Batch</a></li>
					<li><a href="#">BIM Admission Notice 2074 Batch</a></li>
						<li><a href="#">Teacher's Day 2074 Celebration</a></li>
					<li><a href="#">Blood Donation Program 2074</a></li> -->
					<button class="alert alert-danger round"><a href="notice.php"> See more</a></button>
				</ul>
				</div>
			</div>
		</div>
		<div class="col-md">