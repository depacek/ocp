<?php
require_once "common.class.php";
class TeacherSubject extends common {
	public $id,$teacher_id,$subject_id;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	

	function create(){
			// print_r($this);
			 $sql="insert into teacher_subject (teacher_id,subject_id) values ('$this->teacher_id','$this->subject_id') ";
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
			echo $sql="delete from teacher_subject where id='$this->id'";
			return $this->delete($sql);
		}

}

?>