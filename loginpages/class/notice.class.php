<?php
require_once "common.class.php";
class Notice extends Common{
	public $id,$title,$description,$status,$created_by,$updated_by,$created_date,$updated_date;

	var $conn;
 	function set($var,$value) {
		$this->connect();
		$this->$var= $this->conn->real_escape_string($value);
	}
	function get($var) {
		return $this->$var;
	}
	function create(){
			// print_r($this);
			 $sql="insert into notice (title,description,status,created_by,created_date) values ('$this->title','$this->description','$this->status','$this->created_by','$this->created_date') ";
			 return $this->insert($sql);

		}
	public function list(){
			$sql="select * from notice";
			return $this->select($sql);
		}
		public function listNotice(){
			$sql="select * from notice where status=1 order by created_date desc limit 5";
			return $this->select($sql);
		}
		public function listAllNotice(){
			$sql="select * from notice where status=1 order by created_date desc";
			return $this->select($sql);
		}
		public function listNoticeById(){
			$sql="select * from notice where id=$this->id";
			return $this->select($sql);
		}
	public function remove(){
			$sql="delete from notice where id='$this->id'";
			return $this->delete($sql);
		}
		public function edit(){
			 $sql="update notice set title='$this->title',description='$this->description',status='$this->status',updated_by='$this->updated_by',updated_date='$this->updated_date' where id='$this->id'";
			return $this->update($sql);
		}

}

?>