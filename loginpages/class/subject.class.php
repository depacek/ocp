<?php
require_once "common.class.php";
class Subject extends common {
	public $id,$name,$semister_id;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	

	// function create(){
	// 		// print_r($this);
	// 		 $sql="insert into student (name,username,email,phone,password,join_year,semister_id) values ('$this->name','$this->username','$this->email','$this->phone','$this->password','$this->join_year','$this->semister_id') ";
	// 		 // return $this->insert($sql);

	// 	}
	public function listSub()
		{
			$sql="select * from subject ";
			return $this->select($sql);
		}
		public function listById($subject_id)
		{
			$sql="select * from teacher_subject where teacher_id='$subject_id'";
			return $this->select($sql);
		}
		function lists()
		{
			$sql="select * from teacher_subject ";
			return $this->select($sql);
		}
		public function list($semister_id)
		{
			$sql="select * from subject where semister_id='$semister_id'";
			return $this->select($sql);
		}

}

?>