<?php
$title="Teacher";
@session_start();
if(!isset($_SESSION['teacher_name']) || empty($_SESSION['teacher_name'])){
        header('location:teacher.php?msg=1');
    }else{
    	$name=$_SESSION['teacher_name'];
    }
    $pannel="Teacher";
    require_once "headmain.php";
    require_once "object.php";
    $data=$subject->listById($_SESSION['id']);
    $subj=$subject->listSub();
    // print_r($subj);
// $notices=$notice->listNotice();


?>

<?php
	
	
?>

                     <ul class="last">
                        
                       <!--  <li>
                           <h2> <a href="dashboard.php" class="white nav-tabs"> <span><i class="fa fa-dashboard fa-fw"></i></span> Dashboard</a></h2>
                        </li> -->
                        <?php foreach ($data as $da) {?>
                        <li>                           
                            <a href="" class="white nav-tabs"><span><i class="fa fa-user fa-fw"></i></span><?php foreach ($subj as $sj) {
                                if ($sj->subject_id==$da->subject_id) {
                                    echo $sj->name;
                                }
                            } ?></a>
                            <ul>
                                <li><a href="create_doc.php?id=<?php echo $da->subject_id; ?>"> <span><i class="fa fa-plus fa-fw"></i></span>Add File</a></li>
                                <li><a href="list_doc.php?id=<?php echo $da->subject_id; ?>"> <span><i class="fa fa-list fa-fw"></i></span>list File</a></li>
                                
                            </ul>
                            

                        </li>
                    <?php } ?>
                    </ul>
                    <ul>
                                <div class="mrg ">
                        <div class="mrg ">..</div>
                    </div>
                            </ul>
                    <div class="mrg ">
                        <div class="mrg ">..</div>
                    </div>
                    

				 
				</div>
			</div>
			
		</div>
		<div class="col-md">
			<article>
  			<!-- <h4>this is <?php echo $head; ?></h4> -->

