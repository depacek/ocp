

<?php
$title="Comment List";
    require_once "teacher_head.php";
    require_once "object.php";
    $comment->set('document_id',$_GET['id']);
    $comments=$comment->listByCID();
    // $sem=$semister->list();
// print_r($comments);

?>
<div class="row">
			<div class="col-lg-12">
    <div class="slider"><h3>Teacher Pannel</h3></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            list Comment
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Comment</th>
                                                <th>Commented By</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($comments as $cmt) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                
                                                <td><?php echo $cmt->comment;?></td>
                                                <td><?php echo $cmt->commented_by;?></td>
                                                <td><?php echo $cmt->commented_date;?></td>
                                                <td><?php if ($cmt->status==1) {?>
                                                   <span class="btn btn-success">Active</span>
                                               <?php } else{?>
                                                    <span class="btn btn-danger">De Active</span>
                                               <?php } ?></td>
                                                
                                                <td>
                                                    <a href="delete_comment.php?mid=<?php echo $_GET['id'];?>&id=<?php echo $cmt->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                    <?php if ($cmt->status==1) {?>
                                                   <a href="edit_comment.php?mid=<?php echo $_GET['id']; ?>&id=<?php echo $cmt->id; ?>&status=0" class="btn btn-danger" title="edit">De Activate</a>
                                               <?php } else{?>
                                                    <a href="edit_comment.php?mid=<?php echo $_GET['id']; ?>&id=<?php echo $cmt->id; ?>&status=1" class="btn btn-success" title="edit">activate</i></a>
                                               <?php } ?>
                                                    
                                                    
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                        
                                    </table>
                                    
                                   
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			
            
            </div>
       

<?php require_once"footer.php"; ?>