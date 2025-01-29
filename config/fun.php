<?php

class fun
{
    private $db;
    function __construct($con)
    {
        $this->db = $con;

    }

    public function login($username,$password){
        
        $query    = "SELECT * FROM `user` WHERE `userid`='$username' AND `pass` = '$password'";
        $result = mysqli_query($this->db, $query);

        
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
           $fetch = mysqli_fetch_assoc($result);
                $role = $fetch["role"];
                return $role;
            
           
            // Redirect to user dashboard page
           
             
        }
        else{
            return null;
        }
    }

    public function getTeacher($email){
        $query = "SELECT `tid` FROM `teacher` WHERE `email` = '$email'";
        $result = mysqli_query($this->db, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $fetch = mysqli_fetch_assoc($result);
            $teacher = $fetch["tid"];
            return $teacher;
        }
        else{
            return null;
        }
    }
    public function getFaculty($email){
        $query = "SELECT `id` FROM `faculty` WHERE `email` = '$email'";
        $result = mysqli_query($this->db, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $fetch = mysqli_fetch_assoc($result);
            $teacher = $fetch["id"];
            return $teacher;
        }
        else{
            return null;
        }
    }

    



}
?>