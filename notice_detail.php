<?php
$title="Notices";

	require_once "header.php";
	require_once "loginpages/object.php";

	$notice->set('id',$_GET['id']);
	$nots=$notice->listNoticeById();
	// print_r($nots);

	?>

	<!-- <div class="col-md-2">
				<a href="" class="nav-link white"> welcome,user</a> 
			</div> -->
		</div>


		

			<?php
	require_once "leftblock.php";
	// print_r($nots);
	?>

	
			<article>
  			<h4><span class="slider">Notice</span></h4>
	  		<!-- <p>
				Orchid international college(OIC) afliated to Tribhuvan University,was established in 2010 AD and Promoted by a group of experienced and dedicated academicians, computer engineers, management professionals and reputed sofware company of Nepal.
				The goal of the college is to provide a high quality education that will enable the students to embrace the challenges of the modern world and establish the foundation for a successful future.
			</p> -->
						<div class="row">
				<div class="col-md">
			 		<h2><?php echo $nots[0]->title ?></h2>
			 		<p class="notice">
			 			<?php echo $nots[0]->description; ?>
			 		</p>
			 		<span class="dats">
			 			Created By:  <?php echo $nots[0]->created_by; ?>
			 			<br/>
			 		</span>
			 		<span class="dats">
			 			Created Date:  <?php echo $nots[0]->created_date; ?>

			 		</span>
			 		<span class="dats">
			 			Updated By:  <?php echo $nots[0]->updated_by; ?>
			 			<br/>
			 		</span>
			 		<span class="dats">
			 			Updated Date:  <?php echo $nots[0]->updated_date; ?>

			 		</span>
				
				</div>
			</div>
  			</article>
  		
		</div>
	</div>

			
	<?php
	require_once "footer.php";
	?>