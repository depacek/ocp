<?php
 require_once "object.php";
                 $teacherSubject->set('id',$_GET['id']);
 $teacherSubject->remove();
 header('location:list_teacher.php');
?>