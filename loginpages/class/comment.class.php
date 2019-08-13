<?php
require_once "common.class.php";
class Comment extends common {
	public $id,$comment,$commented_by,$commented_date,$status,$document_id;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	

	function create(){
			// print_r($this);
			 $sql="insert into comment (comment,commented_by,commented_date,status,document_id) values ('$this->comment','$this->commented_by','$this->commented_date','$this->status','$this->document_id') ";
			 return $this->insert($sql);

		}
		public function listByID()
		{
			$sql="select * from comment where status=1 and document_id='$this->document_id' order by commented_date desc";
			return $this->select($sql);
		}
		function listByCID()
		{
			$sql="select * from comment where document_id='$this->document_id'";
			return $this->select($sql);
		}
		function edit(){
			$sql="update comment set status='$this->status' where id='$this->id'";
			return $this->update($sql);
		}
		function remove(){
			$sql="delete from comment where id='$this->id'";
			return $this->delete($sql);
		}

}

?>