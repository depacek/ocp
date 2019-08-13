<?php
$title="Student";
    require_once "student_header.php";
    $document->set('subject_id',$_GET['id']);
    $docs=$document->listBySubjectID();
    
    
?>
		<div class="row">
			<div class="dats">
				<form action="file_search.php?id=<?php echo $_GET['id']; ?>" class="form-control" method="post" id="search">
					<input type="text" name="search" placeholder="search" required="" title="  .">
					<input type="submit" name="submit" value="Search" class="btn btn-primary">
				</form>
			</div>
			
				<?php foreach ($docs as $dc) {?>
					<form class="form-control cmt">
				 	<div class="form-control">
				 		<h4><?php echo $dc->title ?></h4><br>
				 		<h2><a href="file_detail.php?id=<?php echo $dc->id;?>"><?php echo $dc->name; ?></a></h2>
				 		<div class="slider"></div>
                    	<span class="dats">Created By:  <?php echo $dc->created; ?></span>
                    	<span class="dats">Created Date:  <?php echo $dc->created_date; ?></span>
				 		
                    </div>
                </form>
					
				<?php } ?>
			
			
            
            </div>
        </div>
                <!-- /.main col -->
			</div>
			<!-- <div class="col-md-2"></div> -->
			
	  	<!-- </div>   	 -->
	</div>
	<!-- <div class="hello"></div> -->
  			</article>
 <?php require_once "footer.php";?> 
 <script src="../js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').validate();
            // console.log('hello');
        });
    </script>		
		