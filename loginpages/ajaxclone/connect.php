<?php 
	$conn=new mysqli('localhost','root','','db_ajaxclone');
	if ($conn->connect_errno !=0) {
		die('Database Connection Error');
	}
 ?>