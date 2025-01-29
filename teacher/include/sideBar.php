<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

   
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#batch-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="batch-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
              <a href="attendance.php">
                <i class="bi bi-circle"></i><span>Attendance</span>
              </a>
            </li>
            <li>
              <a href="assignment_completion.php">
                <i class="bi bi-circle"></i><span>Assignment completion</span>
              </a>
            </li>
            <li>
              <a href="clearance_check.php">
                <i class="bi bi-circle"></i><span>Clearance Check</span>
              </a>
            </li>
      </ul>
    <li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#assign-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Assignments</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="assign-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
              <a href="add_assignment.php">
                <i class="bi bi-circle"></i><span>Add Assignment</span>
              </a>
            </li>
            <li>
              <a href="view_assignment.php">
                <i class="bi bi-circle"></i><span>View Assignment</span>
              </a>
            </li>
            
      </ul>
    <li>
    



  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      Logout
    </a>

  </li>

  <!-- End Tables Nav -->




</aside>