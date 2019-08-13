<?php
	$semister=$_POST['semister'];
	require_once 'connect.php';
	
	// echo $semister;
	$sql="select * from subject where semister_id='$semister'";
	 $aa=$conn->query($sql);
	 // print_r($aa);
	 $option="<option value=''> select subject</option>";
	 while ($c=$aa->fetch_object()) {
	 	 $option.= "<option value=$c->subject_id>$c->name</option>";
	 }
	echo $option;

?>
