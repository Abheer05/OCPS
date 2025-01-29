<?php 
    include 'include/auth_session.php';
    include "connect/db.php";        
    include 'connect/fun.php';

    $connect=new connect();
    $fun=new fun($connect->dbconnect());

    
   


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php 
    include "include/links.php";
  ?>
</head>

<body>

  <!-- ======= Header ======= -->
    <?php 
      include "include/header.php";
    ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    <?php 
      include "include/sideBar.php";
    ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <section>
    <div class="row">
    <div class="d-flex align-items-center justify-content-center col-12" style="height: 20rem" >
        <img src="./../images/jit_logo.png" class="img-fluid h-100" alt="">
      <h1 class="fw-bold fs-1">JIT Training and Placement Panel</h1>
      </div>
    </div>
   </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php 
 include "include/footer.php";
 ?>

</body>

</html>