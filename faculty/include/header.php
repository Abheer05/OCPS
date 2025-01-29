<header id="header" class="header fixed-top d-flex align-items-center">
<?php 
  require_once "connect/db.php";        
  require_once 'connect/fun.php';
  require_once 'include/auth_session.php';

  $connect=new connect();
  $fun=new fun($connect->dbconnect());

  $id = $_SESSION['uname'];
  $teacher = $fun->fetchFacultyWithId($id);
  $tname = ($teacher != null)?($teacher['name']):(' ');
  $email = ($teacher != null)?($teacher['email']):(' ');
  $phone = ($teacher != null)?($teacher['role']):(' ');
  $salary = ($teacher != null)?($teacher['salary']):(' ');
?>
<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="./../images/jit_logo.png" alt="">
    <span class="d-none d-lg-block"> Faculty</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->
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
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $tname?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $tname?></h6>
          <span>Faculty</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

       

        

        

        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>

