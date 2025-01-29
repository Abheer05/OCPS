<?php 
    session_start();
    include("config/db.php");
    include("config/fun.php");
    $connect=new connect();
    $fun=new fun($connect->dbconnect());
    

    if(isset($_POST["submit"])){
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        $result = $fun->login($uname,$pass);

        //echo ($result == "teacher")?(1):(0);
        if($result!=null){
            $_SESSION["uname"] = $uname;
            $_SESSION["is_start"] = true;
            
                if($result == "admin"){
                    $_SESSION["role"] = $result;
                    header("Location: admin/");
                }
                else if($result == "teacher"){
                    $teacher = $fun->getTeacher($uname);
                    $_SESSION["uname"] = $teacher;

                    $_SESSION["role"] = $result;
                    header("Location: teacher/");
                }
                else if($result == "student"){
                    $_SESSION["role"] = $result;
                    header("Location: student/");
             }
                else if($result == "faculty"){
                    $teacher = $fun->getFaculty($uname);
                    $_SESSION["uname"] = $teacher;
                    $_SESSION["role"] = $result;
                    header("Location: faculty/");
             }
             else if($result == "Training and Placement"){
                $_SESSION["role"] = $result;
                header("Location: training_placement/");
             }
            
            else{
                $msg = "Invalid Role";
                header("Location: index.php?msg=$msg");
            }
        }
        else{
            $msg = "No User found";
        echo $msg;
        header("Location: index.php?msg=$msg");
        }
    }
    else{
        $msg = "No User found";
        echo $msg;
        header("Location: index.php?msg=$msg");
    }

?>