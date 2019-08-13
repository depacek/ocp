<?php
 require_once "object.php";
 $student->set('id',$_GET['id']);
 $student->remove();
 header('location:list_student.php');
?>