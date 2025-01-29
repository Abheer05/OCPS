<header id="header" class="header fixed-top d-flex align-items-center">
<?php 
   require_once "connect/db.php";
   require_once "connect/fun.php";
   require_once 'include/auth_session.php';
 
   $connect=new connect();
   $fun=new fun($connect->dbconnect());
?>
<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="./../images/jit_logo.png" alt="">
    <span class="d-none d-lg-block"> ADMIN</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<!-- <div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div> -->
<!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <!-- End Notification Nav -->

    <!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/user.png" alt="user"/>
        <span class="d-none d-md-block  ps-2">ADMIN</span>
      </a><!-- End Profile Iamge Icon -->

      

  </ul>
</nav><!-- End Icons Navigation -->

</header>

