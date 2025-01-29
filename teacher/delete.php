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
    
    
    else if(isset($_GET['stud'])){
        $id = $_GET['id'];
        $delete = $fun->deleteStudent($id);
        if($delete){
            $msg = "Deleted";
        }
        else{
            $msg = "Not Deleted";
        }
        header("Location: view_student.php?msg=$msg");

    }
   
    else if(isset($_GET['assignment'])){
        $id = $_GET['id'];
        $delete = $fun->deleteAssignment($id);
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