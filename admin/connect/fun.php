<?php

class fun
{
    private $db;
    function __construct($con)
    {
        $this->db = $con;

    }

   public function addCourse($name,$code,$type){
    $course = $this->fetchCourseWithCode($code);
    if(mysqli_num_rows($course)> 0){
        return null;
    }
    else{
        $sql = "INSERT INTO `course`( `name`,`course_code`,`type`) VALUES ('$name','$code','$type')";
        $fetch = mysqli_query($this->db, $sql);
         return $fetch;

    }
   }

   public function fetchCourseWithCode($id){
    $sql = "SELECT * FROM `course` WHERE `course_code` = '$id'";
    $fetch = mysqli_query($this->db, $sql);
     return $fetch;
   }
   public function fetchCourseWithId($id){
    $sql = "SELECT * FROM `course` WHERE `course_id` = '$id'";
    $fetch = mysqli_query($this->db, $sql);
     return $fetch;
   }

   public function fetchAllCourses(){
    $sql = "SELECT * FROM `course` ORDER BY `course_id` DESC";
    $fetch = mysqli_query($this->db, $sql);
     return $fetch;
   }

   public function verifyCourse($id,$verify){
        $sql = "UPDATE `course` SET `status`='$verify' WHERE `course_id`='$id'";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;

   }

   public function updateCourse($POST){
        $cname = $POST["cname"];
        $id = $POST["id"];
        $code = $POST["code"];
        $sql = "UPDATE `course` SET `name`='$cname',`course_code`='$code' WHERE `course_id`='$id'";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;
   }

   public function deleteCourse($id){
        $sql = "DELETE FROM `course` WHERE `course_id` = '$id'";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;
   }

   public function addDepartment($name,$intake){
        
        $sql = "INSERT INTO `dept`( `name`, `intake`) VALUES ('$name','$intake')";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;
   }

   public function fetchDepartmentAll(){
        
        $sql = "SELECT * FROM `dept` WHERE 1";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;
   }
   public function fetchDepartmentWithId($id){
        
        $sql = "SELECT * FROM `dept` WHERE `dept_id` = $id";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;
   }

   public function deleteDepartment($id){
        $sql = "DELETE FROM `dept` WHERE `dept_id` = '$id'";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;
   }

   public function updateDepartment($id,$name,$intake){
        $sql = "UPDATE `dept` SET `name`='$name',`intake`='$intake' WHERE `dept_id`='$id'";
        $fetch = mysqli_query($this->db, $sql);
        return $fetch;
   }

   public function addSection($dept,$sec,$sem){
    $sql = "INSERT INTO `class`( `dept`, `sec`, `sem`) VALUES ('$dept','$sec','$sem')";
    $fetch = mysqli_query($this->db, $sql);
    return $fetch;
   }
   public function fetchAllSection(){
    $sql = "SELECT * FROM `class` WHERE 1";
    $fetch = mysqli_query($this->db, $sql);
    return $fetch;
   }
   public function fetchSectionWithId($id){
     $sql = "SELECT * FROM `class` WHERE `class_id` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }

    public function updateSection($id,$dept,$sec,$sem){
          $sql = "UPDATE `class` SET `dept`='$dept',`sec`='$sec',`sem`='$sem' WHERE `class_id`='$id'";
          $fetch = mysqli_query($this->db, $sql);
          return $fetch;
    }

    public function deleteSection($id){
     $sql = "DELETE FROM `class` WHERE `class_id` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }


    public function addTeacher($name,$email,$phone,$salary){
     $sql = "INSERT INTO `teacher`( `name`, `email`, `phone`, `salary`) VALUES ('$name','$email','$phone','$salary')";
     $fetch = mysqli_query($this->db, $sql);
     if($fetch){
          $this->addUserTeacher($email);
     }
          return $fetch;
    }
    public function addFaculty($name,$email,$role,$salary){
     $sql = "INSERT INTO `faculty`( `name`, `email`, `role`, `salary`) VALUES ('$name','$email','$role','$salary')";
     $fetch = mysqli_query($this->db, $sql);
     if($fetch){
          $this->addUserFaculty($email);
     }
          return $fetch;
    }

    public function checkTeacherExists($email){
     $sql = "SELECT * FROM `teacher` WHERE `email` = '$email'";
     $fetch = mysqli_query($this->db, $sql);
     if(mysqli_num_rows($fetch) == 0){
          return true;
     }
     else{
          return false;
     }
    }
    public function checkFacultyExists($email){
     $sql = "SELECT * FROM `faculty` WHERE `email` = '$email'";
     $fetch = mysqli_query($this->db, $sql);
     if(mysqli_num_rows($fetch) == 0){
          return true;
     }
     else{
          return false;
     }
    }

    public function addUserTeacher($id){
     $sql = "INSERT INTO `user`(`userid`, `pass`, `role`) VALUES ('$id','teacher@123','teacher')";
     $result = mysqli_query($this->db,$sql);
     return $result;
    }
    public function addUserFaculty($id){
     $sql = "INSERT INTO `user`(`userid`, `pass`, `role`) VALUES ('$id','faculty@123','faculty')";
     $result = mysqli_query($this->db,$sql);
     return $result;
    }

    public function updateTeacher($id,$name,$email,$phone,$salary){
     $sql = "UPDATE `teacher` SET `name`='$name',`email`='$email',`phone`='$phone',`salary`='$salary' WHERE `tid`='$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }
    public function updateFaculty($id,$name,$email,$role,$salary){
     $sql = "UPDATE `faculty` SET `name`='$name',`email`='$email',`role`='$role',`salary`='$salary' WHERE `id`='$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }

    public function deleteTeacher($id){
     $sql = "DELETE FROM `teacher` WHERE `tid` = $id";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }
    public function deleteFaculty($id){
     $sql = "DELETE FROM `faculty` WHERE `id` = $id";
     $fetch = mysqli_query($this->db, $sql);
     if($fetch){
          $this->deleteUser($id);
     }
     return $fetch;
    }
    public function deleteUser($id){
     $sql = "DELETE FROM `user` WHERE `userid` = '$id'";
     mysqli_query($this->db, $sql);
    }

    public function updateTeacherById($id,$name,$email,$phone,$salary){
     $sql = "UPDATE `teacher` SET `name`='$name',`email`='$email',`phone`='$phone',`salary`='$salary' WHERE `tid`='$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }
    public function updateFacultyById($id,$name,$email,$role,$salary){
     $sql = "UPDATE `faculty` SET `name`='$name',`email`='$email',`role`='$role',`salary`='$salary' WHERE `id`='$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }

    public function fetchAllTeachers(){
     $sql = "SELECT * FROM `teacher` WHERE 1";
     $fetch = mysqli_query($this->db, $sql); 
     return $fetch;
    }
    public function fetchTeacherWithId($id){
     $sql = "SELECT * FROM `teacher` WHERE `tid` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
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


    public function assignCourseteacher($id,$course_id,$class_id){
     $check = $this->checkAssignCourseTeacher($course_id,$class_id);
     if(mysqli_num_rows($check) == 0){
          $sql = "INSERT INTO `teacher_course`(`tid`, `course_id`, `class_id`) VALUES ('$id','$course_id','$class_id')";
          $fetch = mysqli_query($this->db, $sql);

     }
     else{
          $fetch = 0;
     }
     return $fetch;
    }

    public function checkAssignCourseTeacher($course_id,$class_id){
     $sql = "SELECT * FROM `teacher_course` WHERE  `course_id` = '$course_id' and  `class_id` = '$class_id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }

    public function assignedTeacherWithId($id){
     $sql = "SELECT * FROM `teacher_course` WHERE `tid` = '$id' ORDER BY `tid` DESC";
     $fetch = mysqli_query($this->db, $sql);
     
     return $fetch;
    }


    public function assignClassTeacher($class_id, $tid){
     $sql = "UPDATE `class` SET `class_teacher`='$tid' WHERE `class_id`='$class_id'";
     $fetch = mysqli_query($this->db, $sql);
     return $fetch;
    }

    public function checkStudentId($id){
     $sql = "SELECT * FROM `student` WHERE `id` = '$id'";
     $fetch = mysqli_query($this->db, $sql);
     if(mysqli_num_rows($fetch) == 0){
          return true;
     }
     else{
          return false;
     }
    }

    public function setSession($POST){
     $_SESSION['name'] = $POST["name"];
     $_SESSION['fname'] = $POST["fname"];
     $_SESSION['mname'] = $POST["mname"];
     $_SESSION['email'] = $POST["email"];
     $_SESSION['address'] = $POST["address"];
     $_SESSION['pmobile'] = $POST["pmobile"];
     $_SESSION['fphone'] = $POST["fphone"];
     $_SESSION['mmobile'] = $POST["mmobile"];
     $_SESSION['gender'] = $POST["gender"];
     $_SESSION['religion'] = "NA";
     $_SESSION['dob'] = $POST["dob"];

     $_SESSION['school_ssc'] = $POST["school_ssc"];
     $_SESSION['ssc_roll'] = $POST["ssc_roll"];
     $_SESSION['ssc_board'] = $POST["ssc_board"];
     $_SESSION['ssc_year'] = $POST["ssc_year"];
     $_SESSION['ssc_result'] = $POST["ssc_result"];

     $_SESSION['school_hsc'] = $POST["school_hsc"];
     $_SESSION['hsc_roll'] = $POST["hsc_roll"];
     $_SESSION['hsc_board'] = $POST["hsc_board"];
     $_SESSION['hsc_year'] = $POST["hsc_year"];
     $_SESSION['hsc_result'] = $POST["hsc_result"];


    }

    public function deleteSession(){
     unset($_SESSION["name"]);
     unset($_SESSION["fname"]);
     unset($_SESSION["mname"]);
          unset($_SESSION["email"]);
          unset($_SESSION["address"]);
          unset($_SESSION["pmobile"]);
          unset($_SESSION["fphone"]);
          unset($_SESSION["mmobile"]);
          unset($_SESSION["gender"]);
          unset($_SESSION["religion"]);
          unset($_SESSION["dob"]);
          unset($_SESSION["school_ssc"]);
          unset($_SESSION["ssc_roll"]);
          unset($_SESSION["ssc_board"]);
          unset($_SESSION["ssc_year"]);
          unset($_SESSION["ssc_result"]);
          unset($_SESSION["school_hsc"]);
          unset($_SESSION["hsc_roll"]);
          unset($_SESSION["hsc_board"]);
          unset($_SESSION["hsc_year"]);
          unset($_SESSION["hsc_result"]);
    }
    public function addUser($id){
     $sql = "INSERT INTO `user`(`userid`, `pass`, `role`) VALUES ('$id','Nit@123','student')";
     $result = mysqli_query($this->db,$sql);
     return $result;
    }
 
    public function addStudent($POST){
     $id = $POST["id"];
     $name = $POST["name"];
     $fname = $POST["fname"];
     $mname = $POST["mname"];
     $email = $POST["email"];
     $address = $POST["address"];
     $pmobile = $POST["pmobile"];
     $fmobile = $POST["fphone"];
     $mmobile = $POST["mmobile"];
     $gender = $POST["gender"];
     $religion = "NA";
     $dob = $POST["dob"];

     $school_ssc = $POST["school_ssc"];
     $ssc_roll = $POST["ssc_roll"];
     $ssc_board = $POST["ssc_board"];
     $ssc_year = $POST["ssc_year"];
     $ssc_result = $POST["ssc_result"];

     $school_hsc = $POST["school_hsc"];
     $hsc_roll = $POST["hsc_roll"];
     $hsc_board = $POST["hsc_board"];
     $hsc_year = $POST["hsc_year"];
     $hsc_result = $POST["hsc_result"];

     $date_of_joining = $POST["doj"];
     
     $sql = "INSERT INTO `student`(`id`, `name`, `father_name`, `mother_name`, `email`, `personal_mobile`, `father_mobile`, `mother_mobile`, `address`, `birth_day`, `gender`, `religion`, `ssc_school`, `ssc_roll`, `ssc_board`,`ssc_year`, `ssc_result`, `hsc_school`, `hsc_roll`, `hsc_board`,`hsc_year`, `hsc_result`, `date`) 
     VALUES ('$id','$name','$fname','$mname','$email','$pmobile','$fmobile','$mmobile','$address','$dob','$gender','$religion','$school_ssc','$ssc_roll','$ssc_board','$ssc_year','$ssc_result','$school_hsc','$hsc_roll','$hsc_board','$hsc_year','$hsc_result','$date_of_joining')";
     $result = mysqli_query($this->db,$sql);
     if($result){
          $user = $this->addUser($id);
     }
     return $result;
    }

    public function fetchStudentWithId($id){
     $sql = "SELECT * FROM `student` WHERE `id` = '$id'";
     $result = mysqli_query($this->db,$sql);
     if(mysqli_num_rows($result) == 1){
          return true;
     }
     else{
          return false;
     }
    }

    public function fetchAllStudent(){
          $sql = "SELECT * FROM `student` WHERE 1";
          $result = mysqli_query($this->db,$sql);
          return $result;
    }


    public function deleteStudent($id){
     $sql = "DELETE FROM `student` WHERE `id`  = '$id'";
     $result = mysqli_query($this->db,$sql);
     if($result){
           $this->deleteClassAssignedStudent($id);
     }
 

          return $result;
     
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

    public function deleteClassAssignedStudent($id){
     $sql = "DELETE FROM `stud_class` WHERE `sid` = '$id'";
          $result = mysqli_query($this->db,$sql);
          
    }

    public function assignClassStudent($sid,$cid){
     $stud = $this->fetchStudClassSID($sid);
     if(mysqli_num_rows($stud) == 1){
          $sql = "UPDATE `stud_class` SET `class_id`='$cid' WHERE `sid` = '$sid'";
     }
     else{
          $sql = "INSERT INTO `stud_class`(`sid`, `class_id`,  `clearance`) VALUES ('$sid','$cid','0')";

     }
      $result = mysqli_query($this->db,$sql);
      return $result;
    }


    public function assignCourseClass($class_id, $course_id){

     $sql = "INSERT INTO `stud_course`(`class_id`, `course_id`, `tid`) VALUES ('$class_id','$course_id','[value-3]')";
          $result = mysqli_query($this->db,$sql);
          return $result;
    }


    public function fetchStudClass($sid){
     $sql = "SELECT * FROM `stud_class` WHERE `sid` = '$sid'";
     $result = mysqli_query($this->db,$sql);
     if($result){
          $fetch = mysqli_fetch_assoc($result);
     }
     else{
          $fetch = null;
     }
     return $fetch;
    }
    public function fetchStudClassSID($sid){
     $sql = "SELECT * FROM `stud_class` WHERE `sid` = '$sid'";
     $result = mysqli_query($this->db,$sql);
     
     return $result;
    }

    public function fetchStudentDetails(){
     $sql = "SELECT * FROM `student_cgpa`
     INNER JOIN student_doc on student_cgpa.student_id = student_doc.student_id
     INNER JOIN student on student.id = student_cgpa.student_id
     WHERE verify = 0;";
     $fetch = mysqli_query($this->db,$sql);
     return $fetch;
    }
    
   
    public function verifyStudent($id){
     $sql = "UPDATE `student_cgpa` SET `verify`='1' WHERE `student_id`='$id'";
     $fetch = mysqli_query($this->db,$sql);
     return $fetch;
    }

    public function countTeachersAndStudents(){
     $student = "SELECT COUNT(`userid`) as students, `role` FROM `user` WHERE  role = 'student';";
     $teachers = "SELECT COUNT(`userid`) as teachers, `role` FROM `user` WHERE  role = 'teacher';";
     $stud_fetch = mysqli_query($this->db,$student);
     $teach_fetch = mysqli_query($this->db,$teachers);
     $countArray = array();
     if(mysqli_num_rows($stud_fetch) >0){
          $student = mysqli_fetch_assoc($stud_fetch);
          $countArray['students'] = $student['students'];
     }
     else{
          $countArray['students'] = 0;
     }
     if(mysqli_num_rows($teach_fetch) >0){
          $teacher = mysqli_fetch_assoc($teach_fetch);
          $countArray['teachers'] = $teacher['teachers'];
     }
     else{
          $countArray['teachers'] = 0;
     }
     return $countArray;
    }

}
?>