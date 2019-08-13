
<?php 
$title="Student Login";
$head="student login";
 require_once "header.php";
?>


<?php
// @session_start();
if (isset($_COOKIE['teacher_name'])&&!empty($_COOKIE['teacher_name'])) {
    $_SESSION['teacher_name']=$_COOKIE['teacher_name'];
    $_SESSION['teacher_username']=$_COOKIE['teacher_username'];
    $_SESSION['id']=$_COOKIE['id'];
}
if(isset($_SESSION['teacher_name']) || !empty($_SESSION['teacher_name'])){
        header('location:header3.php');
    }
 //    $title="Teacher Login";
 // require_once "header.php";
require_once"object.php";
    if(isset($_POST['btnlogin'])){
    $err=[];
    if(isset($_POST['username'])&&!empty($_POST['username'])&&trim($_POST['username'])!=''){
        $teacher->set('username',$_POST['username']);
    }else{
        $err['username']="Enter your username";
    }
     if(isset($_POST['password'])&&!empty($_POST['password'])&&trim($_POST['password'])!=''){
         $teacher->set('password',md5($_POST['password']));
    }else{
        $err['password']="Enter your password";
    }
    // print_r($err);
    if (count($err)==0) {
        $login_err = $teacher->login();
    }
}

?>

		
	  		<div class="container-fluid ">
  		<div class="mrg"></div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col header">
				<div class="row">
					<div class="col">
						<img src="../img/teacher.png" class="user">
					</div>
					</div>
					<div class="hello"></div>
				 <div class="row">
				 	
                    <div class="col-lg-12">
                        <h1 class="page-header">Teacher login</h1>
                    </div>
                </div>
                <div class="row">
            <div class="col col-md-offset-4">                    
                    <h4 class=" white center">Log In To Access Teacher Pannel</h4>
                    <div class="panel-body">
                          <?php if(isset($login_err)){?>
                                 <div class="alert alert-danger"> <?php echo $login_err; ?></div>
                            <?php   } ?>
                            <?php if(isset($_GET['msg']) && $_GET['msg']==1){?>
                                <div class="alert alert-danger"> Login to Access Dashboard</div>
                            <?php   } ?>
                        <form role="form" action="" method="post" id="teacher_form"  novalidate="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="name" autofocus required="" title="Enter your Username" >
                                   <?php if(isset($err['username'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['username'];?></div>
                                    <?php   } ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="" title="Enter your Password">
                                     <?php if(isset($err['password'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['password'];?></div>

                                    <?php   } ?>
                                     
                                </div>
                                <div class="checkbox	">
                                    <label class="white">
                                        <input name="remember" type="checkbox" value="Remember Me">&nbsp &nbsp  Remember Me
                                    </label>
                                </div>
                                
                                <button class="btn btn-lg btn-info btn-block" name="btnlogin">Login</button>
                            </fieldset>
                        </form>
                        <div class="hello"></div>
                </div>
            </div>
        </div>
                <!-- /.main col -->
			</div>
			<div class="col-md-2"></div>
			
	  	<!-- </div>   	 -->
	</div>
	<div class="hello"></div>
  			</article>
  		
		</div>
	</div>

			
	<div class="row header">
		<div class="col">
			<p class="center">&copyCopyright Orchid International College</p>
			<p class="aa">Created by: BIM IV sem</p>
		</div>
	</div>


	
</div>
	
	<script src="../js/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#teacher_form').validate();
            console.log('hello');
        });
    </script>
    
  </body>
</html>