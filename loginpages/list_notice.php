<?php
$title="Notice List";
require_once "header1.php";
require_once "object.php";
$notices=$notice->list();
// print_r($teacher);

?>
<div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <div class="slider"><h3>Teacher Pannel</h3></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" id="category_table">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Title</th>
                                                <!-- <th>Description</th> -->
                                                <th>Status</th>
                                                <th>Created By</th>
                                                <th>Updated By</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($notices as $not) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                
                                                <td><?php echo $not->title;?></td>
                                                <!-- <td><?php echo $not->description;?></td> -->
                                               <td><?php if ($not->status==1) {?>
                                                   <span class="btn btn-success">Active</span>
                                               <?php } else{?>
                                                    <span class="btn btn-danger">De Active</span>
                                               <?php } ?></td>
                                                <td><?php echo $not->created_by;?></td>
                                                <td><?php echo $not->updated_by;?></td>
                                                <td><?php echo $not->created_date;?></td>
                                                <td><?php echo $not->updated_date;?></td>                                                                                           
                                                
                                                <td>
                                                    <a href="delete_notice.php?id=<?php echo $not->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                     <a href="edit_notice.php?id=<?php echo $not->id; ?>" class="btn btn-warning" title="edit"><i class="fa fa-edit"></i></a>
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