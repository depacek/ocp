<?php
$title="Student";
    require_once "student_header.php";
    $document->set('id',$_GET['id']);
    $docs=$document->listByID();
    $comment->set('document_id',$_GET['id']);
    if (isset($_POST['btncmt'])) {
        $err=[];           
            if(isset($_POST['comment'])&&!empty($_POST['comment'])&&trim($_POST['comment'])!=''){
                $comment->set('comment',$_POST['comment']);
            }else{
                $err['comment']="Enter comment";
            }

            $comment->set('status',1);
            $comment->set('commented_by',$_SESSION['student_username']);
            $comment->set('commented_date',date('Y-m-d H:i:s'));
             $res=   $comment->create();
        }
             $comments=   $comment->listByID();
    // print_r($docs);
?>
		<div class="row">
				<div class="col-md-12 slider">
			<h2><?php echo $docs[0]->title ?></h2><br>
			<h4><?php echo $docs[0]->name; ?></h4>
			 		<p class="notice">
			 			<?php echo $docs[0]->description; ?>
			 		</p>
			 		<br>
			 			<div class="form-control"><h2><a href="documents/<?php echo $docs[0]->file; ?>"><b><?php echo $docs[0]->file; ?></b></a></h2></div>
			 		<span class="dats">
			 			<b>Created By: </b> <?php echo $docs[0]->created; ?>
			 			<br/>
			 		</span>
			 		<span class="dats">
			 			<b>Created Date: </b>  <?php echo $docs[0]->created_date; ?>

			 		</span>
			 		<!-- <span class="dats">
			 			Updated By:  <?php echo $docs[0]->updated_by; ?>
			 			<br/>
			 		</span>
			 		<span class="dats">
			 			Updated Date:  <?php echo $docs[0]->updated_date; ?>

			 		</span> -->
			 	</div>
			 	<?php foreach ($comments as $c) { ?>
			 	<div class="slider form-control"><?php echo $c->comment; ?><br>
			 	<span class="dats">Commented By:   <?php echo $c->commented_by; ?></span>
			 	<span class="dats">ON:    <?php echo $c->commented_date; ?></span>
			 	</div>
			 <?php } ?>
			
			 	<form action="" method="post" id="comment" class="form-control" novalidate="">
			 		<?php if(isset($res) && $res>0){?>
                         <div class="alert alert-success"> <?php echo 'Commented with id='.$res; ?></div>
                     <?php   }else if (isset($res) && $res==false){ ?>
                             <div class="alert alert-danger"> Error Commenting</div>
                     <?php } ?>
				 	<div class="form-group">
				 		<textarea class="form-control" name="comment" required="" title="Enter Comment" placeholder="Comment Here!"></textarea>
                        <?php if(isset($err['comment'])){?>
                   <!-- <div class="alert alert-danger"> <?php echo $err['comment'];?></div> -->
                   <span class="error"><?php echo $err['comment'];?></span>
                <?php   } ?>
                    </div>
				 	<button type="submit" class="btn btn-info cmt" name="btncmt">Comment</button>
            	</form>
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
            $('#comment').validate();
            // console.log('hello');
        });
    </script> 		
		