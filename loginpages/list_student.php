<?php
$title="Student List";
require_once "header1.php";
require_once "object.php";
$students=$student->list();
$sem=$semister->list();
// print_r($sem);

?>
<div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student list
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Join Year</th>
                                                <th>Status</th>
                                                <th>semister</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($students as $std) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                
                                                <td><?php echo $std->name;?></td>
                                                <td><?php echo $std->username;?></td>
                                               <td><?php echo $std->email ?></td>
                                                <td><?php echo $std->phone;?></td>
                                                <td><?php echo $std->join_year;?></td>
                                                <td><?php if ($std->status==1) {?>
                                                   <span class="btn btn-success">Active</span>
                                               <?php } else{?>
                                                    <span class="btn btn-danger">De Active</span>
                                               <?php } ?></td>
                                                <td><?php foreach ($sem as $s) {
                                                    if($s->id == $std->semister_id){
                                                        echo $s->name;
                                                    }
                                                } ?></td>                                                                                           
                                                
                                                <td>
                                                    <a href="delete_student.php?id=<?php echo $std->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                     <a href="edit_student.php?id=<?php echo $std->id; ?>" class="btn btn-warning" title="edit"><i class="fa fa-edit"></i></a>
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