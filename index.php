	<?php
	$title="Home";

	require_once "header.php";
	require_once "loginpages/object.php";
$notices=$notice->listNotice();
	?>
			<!-- <div class="col-md-2">
				<a href="" class="nav-link white"> welcome,user</a> 
			</div> -->
		</div>


		<div class="row slider">
		<div class="col-md-12">
			<div class="carousel slide" id="carousel-56439">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-56439">
					</li>
					<li data-slide-to="1" data-target="#carousel-56439" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-56439">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active carousel-item-left">
						<img class="d-block w-100" alt="Carousel Bootstrap First" src="img/aaa.jpg">
						
					</div>
					<div class="carousel-item carousel-item-next carousel-item-left">
						<img class="d-block w-100" alt="Carousel Bootstrap Second" src="img/bbb.jpg">
						
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Third" src="img/aaa.jpg">
						
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-56439" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-56439" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3 header ">
			<div class="row">
				<div class="col-md">
					<h1>Login AS: </h1>
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
					<!-- <li><a href="#">CSIT-2070 8th Semster Routine Published</a></li>
					<li><a href="#">Bsc CSIT-2074 Admission Notic 2074 Batch</a></li>
					<li><a href="#">BIM Admission Notice 2074 Batch</a></li>
						<li><a href="#">Teacher's Day 2074 Celebration</a></li>
					<li><a href="#">Blood Donation Program 2074</a></li> -->
					<button class="alert alert-danger round"><a href="notice.php"> See more</a></button>
				</ul>
				</div>
			</div>
		</div>
		<div class="col-md">
			<article>
  			<h4>Welcome To Orchid Course Portal</h4>
	  		<p>
				  &nbsp  &nbsp Orchid Course Portal(OCP),The best online course portal where a student can get sufficient study material of a particular subject or course in which they are interested on.This portal is available to provide the study materials easily and help the student to understand the concept in a better way.
			</p>
			<!-- <p>
        		 The main aim of this portal is to accompany students with solution to the problem they might face during their time of studies.Feel free to browse out the site catalog for courses offered for various streams and semester.<br/>Thank You..
			</p> -->
  			</article>
  		<section>
			<div class="row">
				<div class="col hello"><h3 class="slider">About Us</h3>
				<!-- <img src="img/bd.jpg" alt="bilding" > -->
				<p>
					&nbsp  Orchid Course Portal(OCP)  main aim  is to accompany students with solution to the problem they might face during their time of studies.Feel free to browse out the site catalog for courses offered for various streams and semester.<br/>Thank You..
				</p>
					<button><a href="about.php" class="">Read more</a></button>
				</div>
				<div class="col mrg">
					<h3 class="slider">Notices</h3>
				<ul>
					<?php foreach ($notices as $ns) { ?>
					<li><a href="notice_detail.php?id=<?php echo $ns->id;?>"><?php echo $ns->title; ?></a></li>
				<?php } ?>
					<!-- <li><a href="#">CSIT-2070 8th Semster Routine Published</a></li>
					<li><a href="#">Bsc CSIT-2074 Admission Notic 2074 Batch</a></li>
					<li><a href="#">BIM Admission Notice 2074 Batch</a></li>
						<li><a href="#">Teacher's Day 2074 Celebration</a></li>
					<li><a href="#">Blood Donation Program 2074</a></li> -->
					<button><a href="notice.php"> See more</a></button>
				</ul>
				</div>
			</div>
		</section>
		</div>
	</div>

			
	<div class="row header">
		<div class="col">
			<p class="center">&copyCopyright <?php echo date('Y'); ?> Orchid International College</p>
			<p class="aa">Created by: BIM IV sem</p>
		</div>
	</div>


	
</div>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>