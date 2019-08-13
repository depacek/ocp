<?php
@session_start();
if(!isset($_SESSION['admin_name']) || empty($_SESSION['admin_name'])){
        header('location:admin.php?msg=1');
    }else{
    	$name=$_SESSION['admin_name'];
    }
    $pannel="Admin";
    require_once "headmain.php";

?>
 

                     <ul class="last">
                        
                        <li>
                           <h2> <a href="admin_dashboard.php" class="white nav-tabs"> <span><i class="fa fa-dashboard fa-fw"></i></span> Dashboard</a></h2>
                        </li>
                        <li>

                        
                            <a href="" class="white nav-tabs"><span><i class="fa fa-user fa-fw"></i></span> Teacher Management</a>
                            <ul>
                                <li><a href="create_teacher.php"> <span><i class="fa fa-plus fa-fw"></i></span>Add Teacher</a></li>
                                <li><a href="list_teacher.php"> <span><i class="fa fa-list fa-fw"></i></span>list Teacher</a></li>
                                
                            </ul>

                        </li>
                        <li>
                            <a href="" class="white nav-tabs"><span><i class="fa fa-male fa-fw"></i></span> Student Management</a>
                            <ul>
                                <li><a href="create_student.php"> <span><i class="fa fa-plus fa-fw"></i></span>Add Student</a></li>
                                <li><a href="list_student.php"> <span><i class="fa fa-list fa-fw"></i></span>list Student</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="" class="white nav-tabs"><span><i class="fa  fa-file-o fa-fw"></i></span> Notice Management</a>
                            <ul>
                                <li><a href="create_notice.php"> <span><i class="fa fa-plus fa-fw"></i></span>Add Notice</a></li>
                                <li><a href="list_notice.php"> <span><i class="fa fa-list fa-fw"></i></span>list Notice</a></li>
                                
                            </ul>
                        </li>
                         <li>
                            <a href="" class="white nav-tabs"><span><i class="fa  fa-file-o fa-fw"></i></span> Admin Management</a>
                            <ul>
                                <li><a href="create_admin.php"> <span><i class="fa fa-plus fa-fw"></i></span>Add Admin</a></li>
                                <li><a href="list_admin.php"> <span><i class="fa fa-list fa-fw"></i></span>list Admin</a></li>
                                
                            </ul>
                        </li>
                    </ul>

				</div>
			</div>
			
		</div>
		<div class="col-md">
			<article>
  			<!-- <h4>this is <?php echo $head; ?></h4> -->





	  		<div class="container-fluid ">
  		<div class="slider"><h3>Admin Pannel</h3></div>
		