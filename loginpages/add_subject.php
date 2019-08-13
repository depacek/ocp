<?php
$title="Subject Add";

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
if (isset($_POST['btnadd'])) {
        $err=[];
        if(isset($_POST['subject'])&&!empty($_POST['subject'])&&trim($_POST['subject'])!=''){
                $teacherSubject->set('subject_id',$_POST['subject']);
            }else{
                $err['subject']="Enter subject";
            }
                $teacherSubject->set('teacher_id',$_GET['id']);

             // $sub=$_POST['subject'];
             // foreach ($sub as $s) {
             //     $teacherSubject->set('teacher_id',$res);
             //     $teacherSubject->set('subject_id',$s);
             // }
            if (count($err)==0) {
             $res=$teacherSubject->create();  
            }
            // print_r($_POST);


        }

?>
<div class="row">
            <div class="col-md-11">

                <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Subject
                        </div>
                        <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> <?php echo 'Subject added with id='.$res; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error adding Subject</div>
                                         <?php } ?>
                
                <form  action="" method="post" id="add_subject" novalidate="">
                    <label>subject</label>
                            <div class="form-control">      
                            <select name="semister" id="semister1" class="semister">
                                <option value="">select semister</option>
                                <?php  foreach ($semisters as $s) {?>
                                    <option value="<?php  echo $s->id; ?>"><?php  echo $s->name; ?></option>                
                                <?php  } ?>     
                            </select>   
                         
                         <select name="subject" id="subject" class="subject" required="" title="select subject">
                                <option value="">select subject</option>                                
                            </select>                
                           
                        </div>
                     
                         <?php if(isset($err['subject'])){?>
                           <span class="error"><?php echo $err['subject'];?></span>
                        <?php   } ?> 
                    <br>
                                         
                                        <button type="submit" class="btn btn-info" name="btnadd">Add Subject</button>
                                        <!-- <input type="submit" name="btnadd" value="submit"> -->
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </form>

            </div>
            
            
            </div>
       

<?php require_once"footer.php"; ?>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    
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
                            $('#subject').html('');
                            $('#subject').html(resp);
                        }
                    });
            });
                
        });
    </script>
    <script src="../js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#add_subject').validate();
            console.log('hello');
        });
    </script>