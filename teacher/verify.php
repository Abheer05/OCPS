<?php 
    include "connect/db.php";
    include "connect/fun.php";
    include 'include/auth_session.php';
  
    $connect = new connect();
    $fun=new fun($connect->dbconnect());
  
    //$fetch = $fun->fetchStudents();
    if(isset($_GET['assignment'])){
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $verified = !$_GET['verify'];
                    
            $verify = $fun->updateAssignmentStatus($id,$verified);
            echo $verify;
            //header("Location: view-student.php");
        }
        else{
            //header("Location: view-student.php");

        }
    }
    else if(isset($_GET['batch'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $verify = $_GET['verify'];
                    
            //$verify = $fun->updateBatchStatus($id,$verify);
            header("Location: view_batches.php");
        }
        else{
            header("Location: view_ batches.php");

        }
    }
   
    else{
        //header("Location: index.php");
    }
    

?>