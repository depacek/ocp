<?php
 require_once "object.php";
 $teacher->set('id',$_GET['id']);
 $teacher->remove();
 header('location:list_teacher.php');
?>