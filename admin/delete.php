<?php 
    include "connect/db.php";
    include "connect/fun.php";
    include 'include/auth_session.php';

    $connect = new connect();
    $fun = new fun($connect->dbconnect());
    if(isset($_GET['course'])){
        $id = $_GET['id'];
        $delete = $fun->deleteCourse($id);
        if($delete){
            $msg = "Deleted";
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_course.php?msg=$msg");


    }
    else if(isset($_GET['dept'])){
        $id = $_GET['id'];
        $delete = $fun->deleteDepartment( $id );
        if($delete){
            $msg = "Deleted";   
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_dept.php?msg=$msg");

    }
    else if(isset($_GET['faculty'])){
        $id = $_GET['id'];
        $delete = $fun->deleteFaculty( $id );
        if($delete){
            $msg = "Deleted";   
            $fun->deleteUser($id);
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_faculty.php?msg=$msg");

    }
    else if(isset($_GET['sec'])){
        $id = $_GET['id'];
        $delete = $fun->deleteSection($id);
        if($delete){
            $msg = "Deleted";   
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_section.php?msg=$msg");

    }
    else if(isset($_GET['teacher'])){
        $id = $_GET['id'];
        $delete = $fun->deleteTeacher($id);
        if($delete){
            $msg = "Deleted";  
            $fun->deleteUser($id); 
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_teacher.php?msg=$msg");

    }
    else if(isset($_GET['interns'])){
        $id = $_GET['id'];
        //$delete = $fun->deleteWorkingInternById($id);
        if($delete){
            $msg = "Deleted";   
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_interns.php?msg=$msg");

    }
    else if(isset($_GET['stud'])){
        $id = $_GET['id'];
        $delete = $fun->deleteStudent($id);
        if($delete){
            $msg = "Deleted";
             $fun->deleteUser($id);
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_student.php?msg=$msg");

    }
    else if(isset($_GET['Regstudent'])){
        $id = $_GET['id'];
        //$delete = $fun->deleteRegStud($id);
        if($delete){
            $msg = "Deleted";
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_reg_students.php?msg=$msg");

    }
    else if(isset($_GET['assignment'])){
        $id = $_GET['id'];
        //$delete = $fun->deleteAssignment($id);
        if($delete){
            $msg = "Deleted";
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_assignment.php?msg=$msg");

    }
    else{
        $msg = "Invalid";
    }

?>