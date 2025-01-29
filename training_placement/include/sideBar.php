<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <!--Cirruculum-->
    <?php 
      if($_SESSION["uname"] == "tandp_admin"){
    ?>
 <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#batch-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>T&P co-ordinators</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="batch-nav" class="nav-content collapse " data-bs-parent="#batch-nav">
            <li>
              <a href="add_coord.php">
                <i class="bi bi-circle"></i><span>Add Co-ordinator</span>
              </a>
            </li>
            <li>
              <a href="view_coord.php">
                <i class="bi bi-circle"></i><span>View Co-ordinators</span>
              </a>
            </li>


         
        <!--Section-->
       
        


      </ul>
    </li>
  <?php    
      }
    ?>
   
    <!--Teachers-->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#course-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Companies</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="course-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add_company.php">
            <i class="bi bi-circle"></i><span>Add Company</span>
          </a>
        </li>
        <li>
          <a href="view_company.php">
            <i class="bi bi-circle"></i><span>View Company</span>
          </a>
        </li>
       

      </ul>
    </li>

 
 



  <li class="nav-item">
    <a class="nav-link collapsed" href="verify_student.php">
      Verify Student
    </a>

  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      Logout
    </a>

  </li>

  <!-- End Tables Nav -->




</aside>