<?php
require_once "class/admin.class.php";
require_once "class/student.class.php";
require_once "class/teacher.class.php";
require_once "class/notice.class.php";
require_once "class/semister.class.php";
require_once "class/subject.class.php";
require_once "class/document.class.php";
require_once "class/comment.class.php";
require_once "class/teacherSubject.class.php";

$admin = new Admin(); 
$student = new Student();
$teacher = new Teacher(); 
$notice = new Notice(); 
$semister = new Semister(); 
$subject = new Subject(); 
$document = new Document(); 
$comment = new Comment(); 
$teacherSubject = new TeacherSubject(); 

?>