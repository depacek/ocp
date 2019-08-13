<?php
$title="Notice Add";
require_once "header1.php";
require_once "object.php";
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
            $notice->set('created_by',$_SESSION['admin_username']);
            $notice->set('created_date',date('Y-m-d H:i:s'));
            if (count($err)==0) {
             $res=   $notice->create();
            }


        }


?>
<div class="row">
            <div class="col-md-11">

                <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Notice
                        </div>
                        <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> <?php echo 'Notice created with id='.$res; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error inserting Notice</div>
                                         <?php } ?>
                
                <form role="form" action="" method="post" id="create_teacher" novalidate="">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" id="title" required="" title="Enter Title" >
                                           
                                            <?php if(isset($err['title'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['title'];?></div>
                                    <?php   } ?>
                                        </div>
                                    
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" autofocus required="" title="Enter Description"></textarea>
 
                                            <?php if(isset($err['description'])){?>
                                               <div class="alert alert-danger"> <?php echo $err['description'];?></div>
                                            <?php   } ?>
                                        </div>                                     
                                            <div class="form-group">
                                            <label>status</label>
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

                                        
                                                                                                         
                                        <button type="submit" class="btn btn-info" name="btnadd">Add Notice</button>
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
    