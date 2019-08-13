<?php
 require_once "object.php";
 $mid=$_GET['mid'];
 $comment->set('id',$_GET['id']);
 $comment->set('status',$_GET['status']);
 $comment->edit();
 header("location:list_comment.php?id=$mid");
?>