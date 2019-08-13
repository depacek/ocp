<?php
require_once "object.php";
$notices=$notice->listNotice();
@session_start();
// print_r($notices);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OIC | <?php echo $title; ?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/frontpage.css">
     <style type="text/css">
    
		
		
	</style>
	<link href="../img/favicon.ico" rel="icon" type="image/jpg"  />
	
 </head>
 <body>
  	<div class="container-fluid">
		<div class="row header">
			<div class="col-md-3">	
	  		<a href="../index.php"><img src="../img/bgg.png" alt="logo" width="100%"></a>
	  		</div>
	  		<div class="col-md-4">
	  			<a href="../index.php" class="nav-link"> <h1 >Orchid Course Portal</h1></a>
	  		
	  		</div>
	  		<div class="col-md-1"></div>
	  		<div class="col-md">
	  			<a href="#" class="quick white"> </a>
					<ul class=" last info">	
						<li><a href="#"><span><i class="fa  fa-phone fa-fw"></i></span>  01-449744</a></li>
						<li><a href="https://www.google.com/maps/dir//orchid+international+college/" target="_blank"><span><i class="fa fa-map-marker fa-fw"></i></span> Bijayachowk,Gaushala Kathamandu</a></li>
						<!-- <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Bijayachowk,Gaushala Kathamandu</a></li> -->
						<li><a href="#"><span><i class="fa fa-envelope-o fa-fw"></i></span>  info@oic.edu.np</a></li>
					</ul>
	  		</div>
	  </div>
 
	  	<div class=" row  navbar-expand-sm  navbar-dark nav-tabs header">
	  		<div class="col-md-8">
	  			 <ul class="navbar-nav info header">
				    <li>
				      <a class="nav-link" href="../index.php">Home</a>
				    </li>
				   <!--  <li>
				      <a class="nav-link" href="facilities.php">Facilities</a>
				    </li> -->
				    <li >
				      <a class="nav-link" href="../about.php">About Us</a>
				    </li>
				    <li >
				      <a class="nav-link" href="../gallery.php">Gallery</a>
				    </li>
				    <li>
				      <a class="nav-link" href="../contact.php">Contact Us</a>
				    </li>
				    <li >
				      <a class="nav-link" href="../notice.php">Notices</a>
				    </li>
				  </ul>
			</div>
			<div class="col-md-2"></div>

			<div class="col-md-2">
				<!-- <a href="" class="nav-link white"> welcome,user</a>  -->
			</div>
		</div>

	<div class="row">
		<div class="col-md-3 header ">
			<div class="row">
				<div class="col-md">
					<h1>Login as: </h1>
				  <ul class=" last nav-tabs nav-link">
				 	
						 
				    <div class="center"><li class="center">
				      <a class="nav-link" href="admin.php">Admin</a>
				    </li>
				</div>
					 <div class="center"><li class="center">
				      <a class="nav-link" href="teacher.php">Teacher</a>
				    </li>
				</div>
					<div class="center"><li class="center">
				      <a class="nav-link" href="student.php">Student</a>
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
					<li><a href="../notice_detail.php?id=<?php echo $ns->id;?>"><?php echo $ns->title; ?></a></li>
				<?php } ?>
					<!-- <li><a href="#">CSIT-2070 8th Semster Routine Published</a></li>
					<li><a href="#">Bsc CSIT-2074 Admission Notic 2074 Batch</a></li>
					<li><a href="#">BIM Admission Notice 2074 Batch</a></li>
						<li><a href="#">Teacher's Day 2074 Celebration</a></li>
					<li><a href="#">Blood Donation Program 2074</a></li> -->
					<button class="alert alert-danger round"><a href="../notice.php"> See more</a></button>
				</ul>
				</div>
			</div>
		</div>
		<div class="col-md abc">
			<article>
  			<!-- <h4>this is <?php echo $head; ?></h4> -->