<?php
$title="Notice Edit";
require_once "header1.php";
require_once "object.php";
$notice->set('id',$_GET['id']);
if (isset($_POST['btnadd'])) {
        $err=[];
            if(isset($_POST['title'])&&!empty($_POST['title'])&&trim($_POST['title'])!=''){
                $notice->set('title',$_POST['title']);
            }else{
                $err['title']="Enter title";
            }
            if(isset($_POST['description'])&&!empty($_POST['description'])&&trim($_POST['description'])!=''){
                $notice->set('description',$_POST['description']);
            }else{
                $err['description']="Enter description";
            }

            $notice->set('status',$_POST['status']);
            $notice->set('updated_by',$_SESSION['admin_username']);
            $notice->set('updated_date',date('Y-m-d H:i:s'));
            if (count($err)==0) {
             $res=   $notice->edit();
            }
             // $res=   $notice->edit();


        }
        $notices=$notice->listNoticeById();
        // print_r($notices);


?>
<div class="row">
            <div class="col-md-11">

                <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Notice
                        </div>
                        <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> Notice Updated</div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error updating Notice</div>
                                         <?php } ?>
                
                <form role="form" action="" method="post" id="create_teacher" novalidate="">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" id="title" required="" title="Enter Title" value="<?php echo $notices[0]->title; ?>" >
                                           
                                            <?php if(isset($err['title'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['title'];?></div>
                                    <?php   } ?>
                                        </div>
                                    
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" autofocus required="" title="Enter Description"><?php echo $notices[0]->description; ?></textarea>
 
                                            <?php if(isset($err['description'])){?>
                                               <div class="alert alert-danger"> <?php echo $err['description'];?></div>
                                            <?php   } ?>
                                        </div>                                     
                                            <div class="form-group">
                                            <label>status</label>
                                            <?php if ($notices[0]->status==1) { ?>
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
                                            

                                        
                                                                                                         
                                        <button type="submit" class="btn btn-info" name="btnadd">Update Notice</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </form>

            </div>
            
            
            </div>
       

<?php require_once"footer.php"; ?>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
 <script src="../js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#create_teacher').validate();
            console.log('hello');
        });
    </script>
    