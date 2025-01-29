<?php 
     include "connect/db.php";        
     include 'connect/fun.php';
     include 'include/auth_session.php';
 
     $connect=new connect();
     $fun=new fun($connect->dbconnect());

     if(isset($_GET['change'])){
        $id = $_GET['id'];
        $prePass = $_GET['prepassword'];
        $newPass = $_GET['newpassword'];

        $user = $fun->getUser($id,$prePass,$newPass);
        if($user){
            echo "Password Changed";
        }
        else{
            echo "Wrong Password";
        }

     }
?>