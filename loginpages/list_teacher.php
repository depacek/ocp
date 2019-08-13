<!-- <?php
    require_once "connect.php";
    // $sql="select * from semister order by id ";
    // $result=$conn->query($sql);
    $sql="select * from subject ";
    $subject=$result=$conn->query($sql);
    $subject=[];
    while ($row=$result->fetch_object()) {
        array_push($subject, $row);
    }
    // print_r($subject);
    // print_r($semister);
?> -->

<?php
$title="Teacher List";
require_once "header1.php";
require_once "object.php";
$teachers=$teacher->list();
$sub=$subject->listSub();
$data=$subject->lists();

// print_r($data);

?>
<div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Teacher list
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
                                                <th>subject</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($teachers as $teach) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                
                                                <td><?php echo $teach->name;?></td>
                                                <td><?php echo $teach->username;?></td>
                                                <td><?php echo $teach->email;?></td>
                                                
                                                <td><?php foreach ($data as $d) {
                                                    if ($d->teacher_id==$teach->id){
                                                        foreach ($sub as $s) {
                                                           if ($d->subject_id==$s->subject_id){
                                                            echo $s->name;?>
                                                            <button class="btn btn-danger" ><a href="delete_subject.php?id=<?php echo $d->id; ?>" title="delete"  onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-minus white"></i></a></button>
                                                            <br>
                                                       <?php  }}}} ?>
                                                       <button class="btn btn-warning "><a href="add_subject.php?id=<?php echo $teach->id; ?>"><i class="fa fa-plus white"></i></a></button>
                                                   </td>

                                                <!-- <?php foreach ($categories as $c) {
                                                  if ($c->id==$ne->category_id) {
                                                    echo $c->name;
                                                  }
                                                 
                                                } ?> -->




                                                <td><?php if ($teach->status==1) {?>
                                                   <span class="btn btn-success">Active</span>
                                               <?php } else{?>
                                                    <span class="btn btn-danger">De Active</span>
                                               <?php } ?></td>

                                                
                                                
                                                <td>
                                                    <a href="delete_teacher.php?id=<?php echo $teach->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                     <a href="edit_teacher.php?id=<?php echo $teach->id; ?>" class="btn btn-warning" title="edit"><i class="fa fa-edit"></i></a>
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