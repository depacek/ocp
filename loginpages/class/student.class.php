<?php
require_once "common.class.php";
class Student extends Common{
	public $id,$name,$username,$email,$phone,$password,$join_year,$status,$created_by,$semister_id;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	function login(){
		$sql="select * from student where username='$this->username' and password='$this->password' and status=1";
		$conn = new mysqli('localhost','depace','depace','db_colz'); 
		if($conn->connect_errno != 0) {
			die('Database Connection Error');
		}
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$data=$result->fetch_object();
			// print_r($data);
			@session_start();
			$_SESSION['student_name']=$data->name;
			$_SESSION['student_username']=$data->username;
			// $_SESSION['student_email']=$data->email;
			$_SESSION['semister_id']=$data->semister_id;
			if (isset($_POST['remember']) && !empty($_POST['remember'])) {
				setcookie('student_name',$data->name,time()+24*60*60);
				setcookie('student_username',$data->username,time()+24*60*60);
				setcookie('semister_id',$data->semister_id,time()+24*60*60);
			}
			
			header('location:header2.php');
		}else {
			return "Username Password didnt match";
		}
	}

	function create(){
			// print_r($this);
			$sql="insert into student (name,username,email,phone,password,join_year,status,created_by,semister_id) values ('$this->name','$this->username','$this->email','$this->phone','$this->password','$this->join_year','$this->status','$this->created_by','$this->semister_id') ";
			 return $this->insert($sql);

		}
		
		public function list(){
			$sql="select * from student";
			return $this->select($sql);
		}
		function listactive(){
			$sql="select * from student where status=1";
			return $this->select($sql);
		}
		public function listByID(){
			$sql="select * from student where id='$this->id'";
			return $this->select($sql);
		}
		public function edit()
		{
			$sql="update student set name='$this->name',username='$this->username',email='$this->email',password='$this->password',phone='$this->phone',join_year='$this->join_year',status='$this->status',semister_id='$this->semister_id' where id='$this->id' ";
			 return $this->update($sql);
		}
		public function remove()
		{
			$sql="delete from student where id='$this->id'";
			return $this->delete($sql);
		}

}

?>