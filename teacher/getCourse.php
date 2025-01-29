<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());


$class_id=!empty($_POST['class_id'])?$_POST['class_id']:'';
$course_id=!empty($_POST['course_id'])?$_POST['course_id']:'';
$_SESSION['class'] = $class_id;
   $_SESSION['course'] = $course_id; 
$tid = $_SESSION['uname'];
if(isset($_POST['class_id']) && !isset($_POST['course_id']) )
  {
    
   
  $result = $fun->fetchCourseTeachersWithClass($class_id,$tid);
        
  if(mysqli_num_rows($result)>0)
  {
     echo "<option value=''>Select Course</option>";
     while($arr= $result->fetch_assoc())
     {
        $course  = $arr["course_id"];
        $course_name = $fun->fetchCourseWithId($course);
        $c = mysqli_fetch_assoc($course_name);
        echo "<option value='".$arr['course_id']."'>".$c['name']."</option>";
        
      }
   }
   else{
    echo "<option value=''>No course available</option>";
   }  
 }
 else if(isset($_POST['class_id']) && isset($_POST['course_id']) ){
     
  $assign = $fun->fetchAssignmentWithClassCourse($class_id,$course_id,$tid);
  if(mysqli_num_rows($assign)>0)
  {
     echo "<option value=''>Select Assignment</option>";
     while($arr= $assign->fetch_assoc())
     {
        if($arr['status'] == 1){

           echo "<option value='".$arr['assign_id']."'>".$arr['description']."</option>";
        }
        
      }
   }
   else{
    echo "<option value=''>No Assignment assigned</option>";
   }
 }


?>