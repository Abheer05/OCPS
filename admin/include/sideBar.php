<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <!--Cirruculum-->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#batch-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Curriculum</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="batch-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <!--Department-->
        <li>
        <li>
        <li>
          <a class="nav-link collapsed" data-bs-target="#dept-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-list"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="dept-nav" class="nav-content collapse " data-bs-parent="#batch-nav">
            <li>
              <a href="add_dept.php">
                <i class="bi bi-circle"></i><span>Add Department</span>
              </a>
            </li>
            <li>
              <a href="view_dept.php">
                <i class="bi bi-circle"></i><span>View Department</span>
              </a>
            </li>


          </ul>

        </li>

        </li>

        </li>
        <!--Section-->
        <li>
          <a class="nav-link collapsed" data-bs-target="#section-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-list"></i><span>Section</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="section-nav" class="nav-content collapse " data-bs-parent="#batch-nav">
            <li>
              <a href="add_section.php">
                <i class="bi bi-circle"></i><span>Add Section</span>
              </a>
            </li>
            <li>
              <a href="view_section.php">
                <i class="bi bi-circle"></i><span>View Section</span>
              </a>
            </li>


          </ul>

        </li>
        <!--Course-->
        <li>
        <li>
          <a class="nav-link collapsed" data-bs-target="#courses-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-list"></i><span>Course</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="courses-nav" class="nav-content collapse " data-bs-parent="#batch-nav">
            <li>
              <a href="add_course.php">
                <i class="bi bi-circle"></i><span>Add Course</span>
              </a>
            </li>
            <li>
              <a href="view_course.php">
                <i class="bi bi-circle"></i><span>View Course</span>
              </a>
            </li>


          </ul>

        </li>

        </li>


      </ul>
    </li>
    <!--Teachers-->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#course-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Teachers</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="course-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add_teacher.php">
            <i class="bi bi-circle"></i><span>Add Teacher</span>
          </a>
        </li>
        <li>
          <a href="assign_course.php">
            <i class="bi bi-circle"></i><span>Assign Course</span>
          </a>
        </li>
        <li>
          <a href="assign_class.php">
            <i class="bi bi-circle"></i><span>Assign Section</span>
          </a>
        </li>
        <li>
          <a href="view_teacher.php">
            <i class="bi bi-circle"></i><span>View Teacher</span>
          </a>
        </li>

      </ul>
    </li>

  <!-- End Components Nav -->
  <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#faculty-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Faculty</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="faculty-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add_roles.php">
            <i class="bi bi-circle"></i><span>Add Faculty</span>
          </a>
        </li>
        <li>
          <a href="view_faculty.php">
            <i class="bi bi-circle"></i><span>View Faculty</span>
          </a>
        </li>
        

      </ul>
    </li>
  <!--Student-->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#intern-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="intern-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_student.php">
          <i class="bi bi-circle"></i><span>Add Student</span>
        </a>
      </li>
      <li>
        <a href="view_student.php">
          <i class="bi bi-circle"></i><span>View Student</span>
        </a>
      </li>

      <li>
        <a href="assign_stud_section.php">
          <i class="bi bi-circle"></i><span>Assign Section</span>
        </a>
      </li>
      <li>
        <a href="verify_student.php">
          <i class="bi bi-circle"></i><span>Verify Student</span>
        </a>
      </li>


    </ul>
  </li><!-- End Forms Nav -->
  <!--Forms-->
 



  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      Logout
    </a>

  </li>

  <!-- End Tables Nav -->




</aside>