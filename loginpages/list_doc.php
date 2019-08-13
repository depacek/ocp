

<?php
$title="Document List";
    require_once "teacher_head.php";
    require_once "object.php";
    $document->set('subject_id',$_GET['id']);
    $documents=$document->listBySubject();
    $sem=$semister->list();
// print_r($documents);

?>
<div class="row">
			<div class="col-lg-12">
    <div class="slider"><h3>Teacher Pannel</h3></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            list Document
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Title</th>
                                                <th>Name</th>
                                                <th>description</th>
                                                <th>file</th>
                                                <th>Status</th>
                                                <th>Created By</th>
                                                <!-- <th>Created Date</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($documents as $docs) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                
                                                <td><?php echo $docs->title;?></td>
                                                <td><?php echo $docs->name;?></td>
                                                <td><?php echo $docs->description;?></td>
                                                <td><a href=""><?php echo $docs->file;?></a></td>
                                                <td><?php if ($docs->status==1) {?>
                                                   <span class="btn btn-success">Active</span>
                                               <?php } else{?>
                                                    <span class="btn btn-danger">De Active</span>
                                               <?php } ?></td>
                                                <td><?php echo $docs->created_by;?></td>
                                                <!-- <td><?php echo $docs->created_date;?></td> -->
                                                
                                                <td>
                                                    <a href="delete_docs.php?mid=<?php echo $_GET['id'];?>&id=<?php echo $docs->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                     <a href="edit_docs.php?id=<?php echo $docs->id; ?>" class="btn btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                                                     <a href="list_comment.php?id=<?php echo $docs->id; ?>" class="btn btn-primary" title="edit"><i class="fa fa-comment"></i></a>
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