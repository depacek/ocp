<?php
$title="Admin List";
require_once "header1.php";
require_once "object.php";
$admins=$admin->list();
// $sub=$subject->listSub();
// print_r($admins);

?>
<div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Admin list
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" id="category_table">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($admins as $ad) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                
                                                <td><?php echo $ad->name;?></td>
                                                <td><?php echo $ad->username;?></td>
                                                <td><?php echo $ad->email;?></td>
                                                
                                                <td><?php echo $ad->role;?></td>

                                                



                                                <td><?php if ($ad->status==1) {?>
                                                   <span class="btn btn-success">Active</span>
                                               <?php } else{?>
                                                    <span class="btn btn-danger">De Active</span>
                                               <?php } ?></td>

                                                
                                                
                                                <td>
                                                    <a href="delete_admin.php?id=<?php echo $ad->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                     <a href="edit_admin.php?id=<?php echo $ad->id; ?>" class="btn btn-warning" title="edit"><i class="fa fa-edit"></i></a>
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