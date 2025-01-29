<?php
session_start();
unset($_SESSION['uname']);


unset($_SESSION['is_start']);
unset($_SESSION['role']);

session_destroy();
header('location: ../index.php');


?>