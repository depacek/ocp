<?php
    $title="Document Add";
	require_once "teacher_head.php";
	$document->set('subject_id',$_GET['id']);
	require_once "object.php";
      if (isset($_POST['btnsave'])) {
        $err=[];
            if(isset($_POST['name'])&&!empty($_POST['name'])&& trim($_POST['name'])!=''){
                $document->set('name',$_POST['name']);
            }else{
                $err['name']="Enter name";
            }
            if(isset($_POST['title'])&&!empty($_POST['title'])&& trim($_POST['title'])!=''){
                $document->set('title',$_POST['title']);
            }else{
                $err['title']="Enter title";
            }
            if(isset($_POST['description'])&&!empty($_POST['description'])&& trim($_POST['description'])!=''){
                $document->set('description',$_POST['description']);
            }else{
                $err['description']="Enter description";
            }
            if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
                if ($_FILES['file']['type']=='text/plain'||$_FILES['file']['type']=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'||$_FILES['file']['type']=='application/pdf') {
                    move_uploaded_file($_FILES['file']['tmp_name'], 'documents/'.$_FILES['file']['name']);
                $document->set('file',$_FILES['file']['name']);
                }else{
                $err['file']="Invalid File Type";
                }                  
            }else{
                $err['file']="Select File";
            }
            $document->set('status',$_POST['status']);
            $document->set('created_date',date('Y-m-d H:i:s'));
            $document->set('created_by',$_SESSION['teacher_username']);            
            // $admin->set('name',$_POST['name']);
            // $admin->set('username',$_POST['username']);
            // $admin->set('password',$_POST['password']);
            // $admin->set('email',$_POST['email']);
            // $admin->set('role',$_POST['role']);
            // $admin->set('status',$_POST['status']);
            if (count($err)==0) {
            $res=   $document->create();
                
            }
                
     }

 ?>



	  		<div class="container-fluid ">
  		<div class="slider"><h3>Teacher Pannel</h3></div>
		<div class="row">
            Add File
			<div class="col-lg-12">
                                    <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> <?php echo 'Document uploaded with id='.$res; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error uploading new Document</div>
                                         <?php } ?>
                                    <form role="form" action="" method="post" enctype="multipart/form-data" id="create_docs" novalidate="">

                                    	 <div class="form-group">
                                            <label>File Title</label>
                                            <!-- <input class="form-control" name="title" id="title" required="" title="Enter title" > -->
                                            <select class="form-control" name="title" required="" title="Select title">
                                                <option value="">select Title</option>
                                                <option value="Notes">Notes</option>
                                                <option value="Assignment">Assignment</option>
                                                <option value="Books">Books</option>
                                                <option value="Question">Question</option>
                                            </select>
                                            <?php if(isset($err['title'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['title'];?></div>
                                    <?php   } ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" id="name" required="" title="Enter name" >
                                            <?php if(isset($err['name'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['name'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" id="description" required="" title="Enter description"></textarea>
                                            <?php if(isset($err['description'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['description'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>file</label>
                                            <input type="file" class="form-control" name="file" id="file" required="" title="Choose file" >
                                            <?php if(isset($err['file'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['file'];?></div>
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
                                        <button type="submit" class="btn btn-info" name="btnsave">Save Document</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </form>
                                </div>
        


	
<?php require_once "footer.php"; ?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
 <script src="../js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#create_docs').validate();
            // console.log('hello');
        });
    </script>