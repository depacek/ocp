<?php
require_once "common.class.php";
class Teacher extends Common{
	public $id,$name,$username,$email,$password,$created_by,$status;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	function login(){
		$sql="select * from teacher where username='$this->username' and password='$this->password' and status='1'";
		$conn = new mysqli('localhost','depace','depace','db_colz'); 
		if($conn->connect_errno != 0) {
			die('Database Connection Error');
		}
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$data=$result->fetch_object();
			// @session_start();
			$_SESSION['teacher_name']=$data->name;
			$_SESSION['teacher_username']=$data->username;
			// $_SESSION['teacher_email']=$data->email;
			$_SESSION['id']=$data->id;
			if (isset($_POST['remember']) && !empty($_POST['remember'])) {
				setcookie('teacher_name',$data->name,time()+24*60*60);
				setcookie('teacher_username',$data->username,time()+24*60*60);
				setcookie('id',$data->id,time()+24*60*60);
			}
			header('location:header3.php');
		}else {
			return "Username Password didnt match";
		}
	}

	function create(){
			// print_r($this);
			 $sql="insert into teacher (name,email,username,password,status,created_by) values ('$this->name','$this->email','$this->username','$this->password','$this->status','$this->created_by') ";
			 return $this->insert($sql);

		}

		public function list()
		{
			$sql="select * from teacher";
			return $this->select($sql);
		}
		function listactive()
		{
			$sql="select id from teacher where status=1";
			return $this->select($sql);
		}
		public function listByID()
		{
			$sql="select * from teacher where id='$this->id'";
			return $this->select($sql);
		}
		public function remove()
		{
			$sql="delete from teacher where id='$this->id'";
			return $this->delete($sql);
		}
		 function edit()
		{
			$sql="update teacher set name='$this->name',username='$this->username',email='$this->email',password='$this->password',status='$this->status' where id='$this->id' ";
			 return $this->update($sql);
		}

}

?>