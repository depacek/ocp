<?php
require_once "common.class.php";
class Document extends common {
	public $id,$title,$name,$file,$description,$status,$created_by,$created_date,$subject_id;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	

	function create(){
			// print_r($this);
			 $sql="insert into document (title,name,file,description,status,created_by,created_date,subject_id) values ('$this->title','$this->name','$this->file','$this->description','$this->status','$this->created_by','$this->created_date','$this->subject_id') ";
			 return $this->insert($sql);

		}
		public function listBySubject()
		{
			$sql="select * from document where subject_id='$this->subject_id' order by created_date";
			return $this->select($sql);
		}
		function listBySubjectID()
		{
			$sql="select d.id,d.name,d.title,d.description,d.file,d.created_date,t.name as created from document d inner join teacher t
			on d.created_by=t.username where d.subject_id='$this->subject_id'and d.status=1 order by created_date";
			return $this->select($sql);
		}
		public function listByID()
		{
			$sql="select d.id,d.name,d.title,d.description,d.file,d.created_date,t.name as created from document d inner join teacher t
			on d.created_by=t.username where d.id='$this->id'";
			return $this->select($sql);
		}
		function search()
		{
			$sql="select * from document where subject_id='$this->subject_id'and name like '%$this->name%' or title like '%$this->name%'";
			return $this->select($sql);
		}
		 function remove(){
			$sql="delete from document where id='$this->id'";
			return $this->delete($sql);
		}
		public function edit(){
			if(empty($file)) {
			 $sql="update document set title='$this->title',name='$this->name',status='$this->status' where id='$this->id'";
		}else{
			$sql="update document set title='$this->title',name='$this->name',file='$this->file',status='$this->status' where id='$this->id'";

		}
			return $this->update($sql);

		}

}

?>