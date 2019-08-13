<?php
$title="Student Edit";
require_once "header1.php";
require_once "object.php";
$student->set('id',$_GET['id']);
$d=$student->listByID();
$sem=$semister->list();
// print_r($a);
if (isset($_POST['btnadd'])) {
        $err=[];
           if(isset($_POST['name'])&&!empty($_POST['name'])&&trim($_POST['name'])!=''){
                $student->set('name',$_POST['name']);
            }else{
                $err['name']="Enter name";
            }
            if(isset($_POST['username'])&&!empty($_POST['username'])&&trim($_POST['username'])!=''){
                $student->set('username',$_POST['username']);
            }else{
                $err['username']="Enter username";
            }
            if(isset($_POST['password'])&&!empty($_POST['password'])&&trim($_POST['password'])!=''){
                if ($d[0]->password==$_POST['password']) {
                    $student->set('password',$d[0]->password);
                }else{
                    $student->set('password',md5($_POST['password']));

                }
            }else{
                $err['password']="Enter password";
            }
            if(isset($_POST['email'])&&!empty($_POST['email'])&&trim($_POST['email'])!=''){
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
                    $student->set('email',$_POST['email']);
                }else{
                    $err['email']='Invalid Email';
                }
            }else{
                $err['email']="Enter email";
            }
            if(isset($_POST['phone'])&&!empty($_POST['phone'])&&trim($_POST['phone'])!=''){
                $student->set('phone',$_POST['phone']);
            }else{
                $err['phone']="Enter phone";
            }
            if(isset($_POST['join_year'])&&!empty($_POST['join_year'])&&trim($_POST['join_year'])!=''){
                $student->set('join_year',$_POST['join_year']);
            }else{
                $err['join_year']="Enter Join Year";
            }
            if(isset($_POST['semister_id'])&&!empty($_POST['semister_id'])&&trim($_POST['semister_id'])!=''){
                $student->set('semister_id',$_POST['semister_id']);
            }else{
                $err['semister_id']="Enter semister";
            }

            $student->set('status',$_POST['status']);
            $student->set('created_date',date('Y-m-d H:i:s'));
            if (count($err)==0) {
             $res=   $student->edit();
            }


        }
        $data=$student->listByID();
        // print_r($data);


?>
<div class="row">
            <div class="col-md-11">

                <div class="panel panel-default">
                        <div class="panel-heading">
                            Update student
                        </div>
                        <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> student Updated</div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error Updating student</div>
                                         <?php } ?>
                
                                    <form role="form" action="" method="post" id="edit_student" novalidate="">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" id="name" required="" title="Enter Name" value="<?php echo $data[0]->name; ?>">
                                           
                                            <?php if(isset($err['name'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['name'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" id="username" required="" title="Enter Username" value="<?php echo $data[0]->username; ?>">
                                            <?php if(isset($err['username'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['username'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" id="password" type="password" required=""title="Enter Password" value="<?php echo $data[0]->password; ?>">
                                            <?php if(isset($err['password'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['password'];?></div>
                                    <?php   } ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  name="email" type="email" autofocus required="" title="Enter Email" value="<?php echo $data[0]->email; ?>">
                                            <?php if(isset($err['email'])){?>
                                               <div class="alert alert-danger"> <?php echo $err['email'];?></div>
                                            <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="number" min="1" name="phone" id="phone" required="" title="Enter Phone number" value="<?php echo $data[0]->phone; ?>">
                                             <?php if(isset($err['phone'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['phone'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Join Year</label>
                                            <select class="form-control" name="join_year" required="">
                                                <!-- <option value="">Select Year</option> -->
                                                <?php for ($i=date('Y')-5; $i <=date('Y') ; $i++) { if ($i==$data[0]->join_year) {?>
                                                <option value="<?php echo $i; ?>" selected ><?php echo $i; ?></option>
                                                    
                                               <?php } ?>
                                                    
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                               

                                            </select>
                                             <?php if(isset($err['join_year'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['join_year'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Semister</label>
                                            <select class="form-control" name="semister_id" required="">
                                                <!-- <option value="">Select semister</option> -->
                                                <?php foreach ($sem as $s){ if ($s->id==$data[0]->semister_id) {?>
                                                <option value="<?php echo $s->id; ?>" selected><?php echo $s->name; ?></option>

                                                <?php }?>

                                                <option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
                                                <?php } ?>
                                            </select>
                                             <?php if(isset($err['semister_id'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['semister_id'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>status</label>
                                            <?php if ($data[0]->status==1) { ?>
                                                <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id=status" value="1" checked="">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="0">De Active
                                                </label>
                                            </div>
                                               
                                            <?php }else{ ?>
                                                <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id=status" value="1">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="0" checked>De Active
                                                </label>
                                            </div>
                                            <?php } ?>


                                            
                                                                           
                                                                                                         
                                        <button type="submit" class="btn btn-info" name="btnadd">Update student</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </form>

            </div>
            
            
            </div>
       

<?php require_once"footer.php"; ?>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
 <script src="../js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#edit_student').validate();
            console.log('hello');
        });
    </script>
    