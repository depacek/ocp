<?php
$title="Student";
    require_once "student_header.php";
    $document->set('subject_id',$_GET['id']);
    // $docs=$document->listBySubjectID();
    if (isset($_POST['submit'])) {
    	if(isset($_POST['search'])&&!empty($_POST['search'])&&trim($_POST['search'])!=''){
                $document->set('name',$_POST['search']);
            }else{
                $err['search']="No information found";
            }
           	$data= $document->search();
           	// print_r($data);

    }
    
?>
		<div class="row">
			<div class="dats">
				<form action="file_search.php?id=<?php echo $_GET['id']; ?>" class="form-control" method="post">
					<input type="text" name="search" placeholder="search">
					<input type="submit" name="submit" value="Search" class="btn btn-primary">
				</form>
			</div>
			<?php if (isset($err['search'])) {?>
			<div class="alert alert-danger"><?php echo $err['search']; ?></div>
		<?php }?>
				<?php foreach ($data as $dc) {?>
					<form class="form-control cmt">
				 	<div class="form-control">
				 		<h4><?php echo $dc->title ?></h4><br>
				 		<h2><a href="file_detail.php?id=<?php echo $dc->id;?>"><?php echo $dc->name; ?></a></h2>
				 		<div class="slider"></div>
                    	<span class="dats">Created By:  <?php echo $dc->created_by; ?></span>
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
		