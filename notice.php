<?php
$title="Notices";

	require_once "header.php";
	require_once "loginpages/object.php";
	$notics=$notice->listAllNotice();

	?>

	<!-- <div class="col-md-2">
				<a href="" class="nav-link white"> welcome,user</a> 
			</div> -->
		</div>


		

			<?php
	require_once "leftblock.php";
	// print_r($notics);
	?>

	
			<article>
  			<h4><span class="slider">Welcome To Orchid Course Portal</span></h4>
	  		<!-- <p>
				Orchid international college(OIC) afliated to Tribhuvan University,was established in 2010 AD and Promoted by a group of experienced and dedicated academicians, computer engineers, management professionals and reputed sofware company of Nepal.
				The goal of the college is to provide a high quality education that will enable the students to embrace the challenges of the modern world and establish the foundation for a successful future.
			</p> -->
						<div class="row">
				<div class="col-md">
			 		<h2>Notices</h2>
				<ul class="">
					<?php foreach ($notics as $ns) { ?>
					<li><a href="notice_detail.php?id=<?php echo $ns->id;?>"><?php echo $ns->title; ?></a></li>
				<?php } ?>
					<!-- <li><a href="#">CSIT-2070 8th Semster Routine Published</a></li>
					<li><a href="#">Bsc CSIT-2074 Admission Notic 2074 Batch</a></li>
					<li><a href="#">BIM Admission Notice 2074 Batch</a></li>
						<li><a href="#">Teacher's Day 2074 Celebration</a></li>
					<li><a href="#">Blood Donation Program 2074</a></li> -->
					<!-- <button class="alert alert-danger round">See more</button> -->
				</ul>
				</div>
			</div>
  			</article>
  		
		</div>
	</div>

			
	<?php
	require_once "footer.php";
	?>