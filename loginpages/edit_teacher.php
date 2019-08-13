<?php
$title="Teacher Update";

    require_once "connect.php";
    $sql="select * from semister order by id ";
    $result=$conn->query($sql);
   
    $semisters=[];
    while ($row=$result->fetch_object()) {
        array_push($semisters, $row);
    }
    // print_r($semister);
?>

<?php
require_once "header1.php";
require_once "object.php";
$teacher->set('id',$_GET['id']);
$d=$teacher->listByID();
if (isset($_POST['btnadd'])) {
        $err=[];
            if(isset($_POST['name'])&&!empty($_POST['name'])&&trim($_POST['name'])!=''){
                $teacher->set('name',$_POST['name']);
            }else{
                $err['name']="Enter name";
            }
            if(isset($_POST['username'])&&!empty($_POST['username'])&&trim($_POST['username'])!=''){
                $teacher->set('username',$_POST['username']);
            }else{
                $err['username']="Enter username";
            }
            if(isset($_POST['password'])&&!empty($_POST['password'])&&trim($_POST['password'])!=''){
                if ($d[0]->password==$_POST['password']) {
                    $teacher->set('password',$d[0]->password);
                }else{
                    $teacher->set('password',md5($_POST['password']));

                }
            }else{
                $err['password']="Enter password";
            }
            if(isset($_POST['email'])&&!empty($_POST['email'])&&trim($_POST['email'])!=''){
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
                    $teacher->set('email',$_POST['email']);
                }else{
                    $err['email']='Invalid Email';
                }
            }else{
                $err['email']="Enter email";
            }
            // if(isset($_POST['role'])&&!empty($_POST['role'])&&trim($_POST['role'])!=''){
            //     $teacher->set('role',$_POST['role']);
            // }else{
            //     $err['role']="Enter role";
            // }
            
            $teacher->set('status',$_POST['status']);
            if (count($err)==0) {
             $res=   $teacher->edit();
                
            }
             


        }
        $data=$teacher->listByID();
        $sub=$subject->listById($_GET['id']);
        // print_r($sub);


?>
<div class="row">
            <div class="col-md-11">

                <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Teacher
                        </div>
                        <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> <?php echo 'Teacher updated'; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error updating Teacher</div>
                                         <?php } ?>
                
                <form role="form" action="" method="post" id="create_teacher" novalidate="">
                
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
                                            <input class="form-control"  name="email" type="email"required="" title="Enter Email" value="<?php echo $data[0]->email; ?>">
                                            <?php if(isset($err['email'])){?>
                                               <div class="alert alert-danger"> <?php echo $err['email'];?></div>
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
                                                                                                                                                   
                                        <button type="submit" class="btn btn-info" name="btnadd">Update Teacher</button>
                                        <!-- <input type="submit" name="btnadd" value="submit"> -->
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </form>

            </div>
            
            
            </div>
       

<?php require_once"footer.php"; ?>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        var count=0;
        $(document).on("click", ".add_more", function () { 
            var c=$('#hiddencount').val();
            c= parseInt(c) +1;
            $('#hiddencount').val(c);
            var $clone = $('.cloned-row:eq(0)').clone(true);
            //alert("Clone number" + clone);
             $clone.find('span.semadd > [id]').each(function(){this.id='semister'+c});
             $clone.find('span.subadd > [id]').each(function(){this.id='subject'+c});
             $clone.find('.add_more').after("<button class='remove1' id='buttonless'><i class='fa fa-minus'></i></button>")
            $clone.attr('id', "added"+(++count));
            $(this).parents('.sub_add').after($clone);
        });
        $(document).on('click', ".remove1", function (){
            var len = $('.cloned-row').length;
            if(len>1){
                $(this).parents('.sub_add').remove();
            }
        }); 
    </script>
    <script type="text/javascript">
        // $(selector).functionname();
        $(document).ready(function () {
            // alert("bmdolm");
            
            $('.semister').bind('change',function(){
                var a=$(this).attr('id');
                var n=a.substr(8);
                 s=$('#semister'+n).val();
                $.ajax({
                        url:'select_subject.php',
                        data:{'semister':s},
                        method:'post',
                        dataType:'text',
                        success:function(resp){
                            var x='#subject'+n;
                            $(x).html('');
                            $(x).html(resp);
                        }
                    });
            });
                
        });
    </script>
    <script src="../js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#create_teacher').validate();
            console.log('hello');
        });
    </script>