<?php
 require_once "object.php";
 $notice->set('id',$_GET['id']);
 $notice->remove();
 header('location:list_notice.php');
?>