<?php
    session_start();
    if(isset($_SESSION["uname"])&& isset($_SESSION['is_start']) && isset($_SESSION['role']) ) {
        if($_SESSION['is_start'] && $_SESSION['role'] == 'faculty'){
        
        }
        else{
            header("Location: ../index.php");
            exit();
        }

    }
    else{ 
        
        header("Location: ../index.php");
        exit();
       

    }
    
?>