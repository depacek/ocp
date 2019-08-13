<?php
 require_once "object.php";
 $mid=$_GET['mid'];
 $document->set('id',$_GET['id']);
 $document->remove();
 header("location:list_doc.php?id=$mid");
?>