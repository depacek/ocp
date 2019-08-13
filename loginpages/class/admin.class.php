<?php
require_once "common.class.php";
class Admin extends Common{
	public $id,$name,$username,$email,$password,$role,$last_login,$status;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	function login(){
		$sql="select * from admin where username='$this->username' and password='$this->password' and status=1";
		$conn = new mysqli('localhost','depace','depace','db_colz'); 
		if($conn->connect_errno != 0) {
			die('Database Connection Error');
		}
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$data=$result->fetch_object();
			// print_r($data);
			@session_start();
			$_SESSION['admin_name']=$data->name;
			$_SESSION['admin_username']=$data->username;
			// $_SESSION['admin_email']=$data->email;
			if (isset($_POST['remember']) && !empty($_POST['remember'])) {
				setcookie('admin_name',$data->name,time()+24*60*60);
				setcookie('admin_username',$data->username,time()+24*60*60);
			}
			
			
			header('location:admin_dashboard.php');
		}else {
			return "Username Password did not match";
		}
	}
	function create(){
			// print_r($this);
			 $sql="insert into admin (name,username,email,password,role,status) values ('$this->name','$this->username','$this->email','$this->password','$this->role','$this->status') ";
			 return $this->insert($sql);

		}
		public function list(){
			$sql="select * from admin";
			return $this->select($sql);
		}
		public function listByID(){
			$sql="select * from admin where id='$this->id'";
			return $this->select($sql);
		}
		public function remove(){
			$sql="delete from admin where id='$this->id'";
			return $this->delete($sql);
		}
		public function edit()
		{
			$sql="update admin set name='$this->name',username='$this->username',email='$this->email',password='$this->password',role='$this->role',status='$this->status' where id='$this->id' ";
			 return $this->update($sql);
		}
	

}

?>