<?php
@session_start();
if(!isset($_SESSION['student_name']) || empty($_SESSION['student_name'])){
        header('location:student.php?msg=1');
    }else{
    	$name=$_SESSION['student_name'];
    }
    $pannel="Student";
    // print_r($_SESSION);
    require_once "headmain.php";
    require_once "object.php";
    $sub=$subject->list($_SESSION['semister_id']);
    // print_r($sub);
$notices=$notice->listNotice();
?>

                     <ul class="last">
                        
                        <li>
                           <h2> <a href="header2.php" class="white nav-tabs"> <span><i class="fa fa-clipboard fa-fw"></i></span> Syllabus</a></h2>
                        </li>
                        <?php foreach ($sub as $s) { ?>
                        <li>

                        
                            <a href="list_file.php?id=<?php echo $s->subject_id; ?>" class="white nav-tabs"><span><i class="fa fa-book  fa-fw"></i></span><?php echo $s->name; ?></a>

                        </li>
                    <?php } ?>                        
                    </ul>				  
				</div>
			</div>
			<div class="row">
				<div class="col-md">
			 		<h1 class="center">Notices</h1>
				<ul class="last">
					 <?php foreach ($notices as $ns) { ?>
					<li><a href="../notice_detail.php?id=<?php echo $ns->id;?>"><?php echo $ns->title; ?></a></li>
				<?php } ?>
					<button class="alert alert-danger round"><a href="../notice.php"> See more</a></button>
				</ul>
				</div>
			</div>
		</div>
		<div class="col-md">
			<article>
  			<!-- <h4>this is <?php echo $head; ?></h4> -->





	  		<div class="container-fluid ">
  		<div class="slider"><h3>Student Pannel</h3></div>