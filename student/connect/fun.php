<?php

class fun
{
    private $db;
    function __construct($con)
    {
        $this->db = $con;

    }

    public function getUser($id,$pass,$newPass){
     $id = trim($id);
     $pass = trim($pass);
     $sql = "SELECT * FROM `user` WHERE `userid` = '$id' and `pass` = '$pass'";
     $fetch = mysqli_query($this->db,$sql);
     if(mysqli_num_rows($fetch) == 1){
          $sqlup = "UPDATE `user` SET `pass`='$newPass' WHERE `userid`='$id'";
          $update = mysqli_query($this->db,$sqlup);
          if($update){
               return true;
          }
          else{
               return false;
          }
     }
     else{
          return false;
     }
    }

    public function fetchClassAssignedStudentWithId($id){
          $sql = "SELECT * FROM `stud_class` WHERE `sid` = '$id'";
          $result = mysqli_query($this->db,$sql);
          if($result){
               $fetch = mysqli_fetch_assoc($result);
          }
          else{
               $fetch = null;
          }
          return $fetch;
     }
     public function fetchClassWithId($id){
          $sql = "SELECT * FROM `class` WHERE `class_id` = '$id'";
          $fetch = mysqli_query($this->db,$sql);
          if(mysqli_num_rows($fetch)>0){
               return mysqli_fetch_assoc($fetch);
          }
          else{
               return null;
          }    
     }

     public function fetchCoursesWithClass($class_id){

   
          $sql = "SELECT * FROM `teacher_course` WHERE `class_id` = '$class_id' ";
          $fetch = mysqli_query($this->db, $sql);
          return $fetch;
     }

     public function fetchCourseWithId($id){
          $sql = "SELECT * FROM `course` WHERE `course_id` = '$id'";
          $fetch = mysqli_query($this->db, $sql);
           return $fetch;
         }
      

     public function fetchAttendanceWithId($sid,$cid){
     
     
          $sql = "SELECT COUNT(*) AS `total` FROM `attendance` WHERE `sid` = '$sid' and `course_id` = '$cid' ";
          $result = mysqli_query($this->db,$sql);
          $result = mysqli_fetch_assoc($result);  
          return $result;
     }
     public function fetchPresentAttendanceWithId($sid,$cid){
     
     
          $sql = "SELECT COUNT(*) AS `present` FROM `attendance` WHERE `sid` = '$sid' and `course_id` = '$cid' and `status` = 'Present' ";
          $result = mysqli_query($this->db,$sql);
          $result = mysqli_fetch_assoc($result);
          return $result;
     }

  
    public function fetchAttendanceArray($sid){
          $total_class = array();
          $present_class = array();
          $percent_class = array();
          $course = array();
          $class = $this->fetchClassAssignedStudentWithId($sid);
          if($class == null){
               $class_id = 0;
          }
          else{
               $class_id = $class['class_id'];
          }
          $courses = $this->fetchCoursesWithClass($class_id);
          if(mysqli_num_rows($courses)){
               $i = 0;
               while($res = mysqli_fetch_assoc($courses)){

                    $course_id = $res['course_id'];
                    $course[$i] = $course_id;
                    $total_classes = $this->fetchAttendanceWithId($sid,$res['course_id']);
                    $total = $total_classes['total'];
                    $total_class[$i] = $total;
                   // print_r($total_class);
                    $present_classes = $this->fetchPresentAttendanceWithId($sid,$res['course_id']);
                    $present = $present_classes['present'];
                    $present_class[$i] = $present;
                    //print_r($present_class);
                    
                    if($total == 0){
                         $percent = 0;
                         
                    }
                    else{
                         $percent = ($present/$total)*100;
                         
                    }
                    $percent_class[$i] = $percent;
                    $i++;


               }
          }
          return [$total_class,$present_class, $percent_class,$course];
    }

   


    public function fetchAssignments( $sid ){
     $class = $this->fetchClassAssignedStudentWithId($sid);
     if($class == null ){
          $class_id = 0;
     } 
     else{

          $class_id = $class['class_id'];
          
     }
     $sql = "SELECT * FROM `assignment` WHERE `class_id` = '$class_id' and `status`= '1'";
          $result = mysqli_query($this->db,$sql);
        
          return $result;
    }

    public function fetchTeacherWithId($id){
     $sql = "SELECT * FROM `teacher` WHERE `tid` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     $row = (mysqli_num_rows($fetch) > 0) ? mysqli_fetch_assoc($fetch): null;
     return $row;
    }
    public function fetchAllFaculty(){
     $sql = "SELECT * FROM `faculty` WHERE 1";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }
    public function fetchFacultyWithId($id){
     $sql = "SELECT * FROM `faculty` WHERE `id` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }

    public function fetchAssignmentCompleteWithSidAssign($sid,$assign_id){
     $sql = "SELECT * FROM `assignment_complete` WHERE `sid` = '$sid' and `assign_id` = '$assign_id'";
     $fetch = mysqli_query($this->db,$sql);
     $row = (mysqli_num_rows($fetch) == 1) ? mysqli_fetch_assoc($fetch): null;
     return $row;
    }

    public function fetchClearanceWithSidCourseId( $sid,$course_id ){
     $sql = "SELECT * FROM `clearance_check` WHERE `sid` = '$sid' and `course_id` = '$course_id'";
     $fetch = mysqli_query($this->db,$sql);
     $row = (mysqli_num_rows($fetch) == 1) ? mysqli_fetch_assoc($fetch) : null;
     return $row;
    }
    public function fetchClearanceWithSidFid( $sid,$fid ){
     $sql = "SELECT * FROM `faculty_clearance` WHERE `sid` = '$sid' and `fid` = '$fid'";
     $fetch = mysqli_query($this->db,$sql);
     $row = (mysqli_num_rows($fetch) == 1) ? mysqli_fetch_assoc($fetch) : null;
     return $row;
    }
   public function fetchStudentDetails($id){
     $sql = "SELECT * FROM `student` WHERE `id` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     if(mysqli_num_rows($fetch)>0){
          return mysqli_fetch_assoc($fetch);
     }
     else{
          return null;
     }
  
   }

   public function fetchUserWithId($id){
     $sql = "SELECT * FROM `user` WHERE `userid` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     if(mysqli_num_rows($fetch)>0){
          return mysqli_fetch_assoc($fetch);
     }
     else{
          return null;
     }
   }

   public function fetchDeptWithId($id){
     $sql = "SELECT * FROM `dept` WHERE `dept_id` = '$id'";
     $fetch = mysqli_query($this->db,$sql);
     if(mysqli_num_rows($fetch)>0){
          return mysqli_fetch_assoc($fetch);
     }
     else{
          return null;
     }
   }

   public function fetchStudentCGPAWithId($id){
     $sql = "SELECT * FROM `student_cgpa` WHERE `student_id` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     if(mysqli_num_rows($fetch)>0){
          return true;
     }
     else{
          return false;
          }
   }

   public function addStudentcgpa($id,$sem1,$sem2,$sem3,$sem4, $sem5, $sem6, $sem7, $sem8,$skill,$total){
if($this->fetchStudentCGPAWithId($id)){
     $sql = "UPDATE `student_cgpa` SET `sem1`='$sem1',`sem2`='$sem2',`sem3`='$sem3',`sem4`='$sem4',`sem5`='$sem5',`sem6`='$sem6',`sem7`='$sem7',`sem8`='$sem8',`total` = '$total',`skills`='$skill', `verify` = '0' WHERE `student_id` = '$id'";
}
else{
     $sql = "INSERT INTO `student_cgpa`(`student_id`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `sem8`, `total`,`skills`) 
     VALUES ('$id','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$total','$skill')";

}
     $result = mysqli_query($this->db, $sql);
     return $result;
   }

   public function fetchStudentDocWithId($id){
     $sql = "SELECT * FROM `student_doc` WHERE `student_id` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     if(mysqli_num_rows($fetch)>0){
          return true;
     }
     else{
          return false;
     }
   }

   public function addStudentDoc($id,$sem1,$sem2,$sem3,$sem4, $sem5, $sem6, $sem7, $sem8, $aadhar, $intern){
        if($this->fetchStudentDocWithId($id)){
             $sql = "UPDATE `student_doc` SET `sem1_doc` = '$sem1', `sem1_doc` = '$sem2', `sem3_doc` = '$sem3', `sem4_doc` = '$sem4', `sem5_doc`='$sem5', `sem6_doc` = '$sem6', `sem7_doc` = '$sem7', `sem8_doc` = '$sem8', `aadhar` = '$aadhar', `intern` = '$intern' WHERE `student_id` = '$id'";
        }
        else{
             $sql = "INSERT INTO `student_doc`( `student_id`, `sem1_doc`, `sem2_doc`, `sem3_doc`, `sem4_doc`, `sem5_doc`, `sem6_doc`, `sem7_doc`, `sem8_doc`, `aadhar`, `intern`) 
                    VALUES ('$id','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$aadhar','$intern')";

        }
        $result = mysqli_query($this->db, $sql);
        return $result;
   }

   public function fetchMarks($id){
        $sql = "SELECT * FROM `student_cgpa` WHERE `student_id` = '$id'";
        $fetch = mysqli_query($this->db,$sql);
        if(mysqli_num_rows($fetch)>0){
             return mysqli_fetch_assoc($fetch);
        }
        else{
             return null;
        }
        
   }
   public function fetchAllCompany(){
     $sql = "SELECT * FROM `company` ORDER BY `id` DESC";
     $fetch = mysqli_query($this->db, $sql);
      return $fetch;
    }

    public function fetchCompanyWithId($id){
      $sql = "SELECT * FROM `company` WHERE `id` = '$id'";
      $fetch = mysqli_query($this->db, $sql);
      if(mysqli_num_rows($fetch)>0){
           return mysqli_fetch_assoc($fetch);
      }
      else{
           return null;
      }
    }

}
?>