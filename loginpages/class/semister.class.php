<?php
require_once "common.class.php";
class Semister extends common {
	public $id,$name;

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
		public function list()
		{
			$sql="select * from semister order by id";
			return $this->select($sql);
		}

}

?>