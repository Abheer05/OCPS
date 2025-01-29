<?php 
    include "connect/db.php";
    include "connect/fun.php";
    include 'include/auth_session.php';
  
    $connect = new connect();
    $fun=new fun($connect->dbconnect());
  
    //$fetch = $fun->fetchStudents();
    if(isset($_GET['student'])){
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $verified = !$_GET['verify'];
            $verify = $fun->verifyStudent($id);
            echo $verified;
            //$verify = $fun->updateStudentstatus($id,$verified);
            echo $verified;
            header("Location: verify_student.php");
        }
        else{
            header("Location: verify_student.php");

        }
    }
   
    else if(isset($_GET['assignment'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $verify = !$_GET['verify'];
                    
           // $verify = $fun->updateAssignmentStatus($id,$verify);
            echo $verify;
            //header("Location: view_assignment.php");
        }
        else{
            //header("Location: view_assignment.php");

        }
    }
    else{
        //header("Location: index.php");
    }
    

?>