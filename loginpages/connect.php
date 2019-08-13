<?php 
	$conn=new mysqli('localhost','depace','depace','db_colz');
	if ($conn->connect_errno !=0) {
		die('Database Connection Error');
	}
 ?>