<?php 
    include "connect/db.php";        
    include 'connect/fun.php';
    include 'include/auth_session.php';

    $connect=new connect();
    $fun=new fun($connect->dbconnect());

    $id = $_SESSION['uname'];
    $stud = $fun->fetchStudentDetails($id);
    $stud_class = $fun->fetchClassAssignedStudentWithId($id);
    $class_id = ($stud_class != null)?($stud_class['class_id']):(0);
    $class = $fun->fetchClassWithId($class_id);
    $dept_id = ($class != null)?($class['dept']):(0);
    $dept = $fun->fetchDeptWithId($dept_id);
    $class_tid = ($class != null) ?($class['class_teacher']):(0);
    $class_teacher = $fun->fetchTeacherWithId($class_tid);
    
    $student_name = ($stud != null) ?($stud['name']):('');
    $student_fname = ($stud != null) ?($stud['father_name']):('');
    $student_mname = ($stud != null) ?($stud['mother_name']):('');
    $address = ($stud != null) ?($stud['address']):('');
    $email = ($stud != null) ?($stud['email']):('');
    $phone = ($stud != null) ?($stud['personal_mobile']):('');
    $sem = ($class != null) ?($class['sem']):(0);
    $dept_name = ($dept != null)?($dept['name']):('');
    $sec = ($class != null) ?($class['sec']):(0);
    $class_tname = ($class_teacher != null) ?($class_teacher['name']):('');
    
    $marks = $fun->fetchMarks($id);

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

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              
              <h2><?php echo $student_name?></h2>
              <h3>Student</h3>
              <h3><?php echo $id?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-details">Academic Details</button>
                </li>

                

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li> -->

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <!-- <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $student_name?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Father Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $student_fname?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mother Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $student_mname?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $address?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $phone?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-2 col-md-4 label">Department</div>
                    <div class="col-lg-2 col-md-8"><?php echo $dept_name?></div>
                    <div class="col-lg-2 col-md-4 label">Section</div>
                    <div class="col-lg-2 col-md-8"><?php echo $sec?></div>
                    <div class="col-lg-2 col-md-4 label">semester</div>
                    <div class="col-lg-2 col-md-8"><?php echo $sem?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Class Teacher</div>
                    <div class="col-lg-9 col-md-8"><?php echo $class_tname?></div>
                  </div>

                </div>

                <div class="tab-pane fade   profile-details" id="profile-details">
                  
                  <h5 class="card-title">Academic Details</h5>
                  <?php 
                    for($i = 0; $i<$sem-1; $i++){
                      $mark  =(!empty($marks["sem".$i+1]))? $marks["sem".$i+1]:"Not Uploaded";
                  ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Sem <?= $i+1?> Marks</div>
                      <div class="col-lg-9 col-md-8"><?php echo $mark?></div>
                    </div>
                  <?php
                    }
                  
                  ?>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Skills</div>
                    <div class="col-lg-9 col-md-8"><?php echo (!empty($marks["skills"])?($marks["skills"]):("Not Uploaded"))?></div>
                  </div>

                  <div class="row d-flex">
                    <div class="col-lg-3 col-md-4 label">Verification</div></div>
                    <div class="col-lg-9 col-md-8"><?php 
                        echo (!empty($marks["verify"]) && $marks["verify"] == 1)?("<p class='text-success' >Verified</p>"):("<p class='text-danger' >Not Verified</p>");
                      ?></div>
                  </div>

                 

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="myForm" >
                  <div class="alert alert-danger alert-dismissible fade show" id="error" role="alert"  hidden>
                 
                    </div>
                  <div class="alert alert-success alert-dismissible fade show" id="success" role="alert"  hidden>
                 
                    </div>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password"  class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
<script>
  document.getElementById("myForm").addEventListener("submit",function(event){
    event.preventDefault();
    const id = <?php echo $id?>;
    const prePassword = document.getElementById("currentPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const renewPassword = document.getElementById("renewPassword").value;
    if(newPassword == renewPassword ){
      fetch(`changePassword.php?change&id=${id}&prepassword=${prePassword}&newpassword=${newPassword}`)
          .then(res => res.text())
          .then(data => {
            console.log(data);
            if(data == "Password Changed"){
              document.getElementById("success").innerHTML = data;
              document.getElementById("success").removeAttribute("hidden");
              document.getElementById("error").setAttribute("hidden",""); 

            }
            else{
              document.getElementById("error").innerHTML = data;
              document.getElementById("success").setAttribute("hidden",""); 

              document.getElementById("error").removeAttribute("hidden"); 
            }
          });
    }
    else{
      document.getElementById("error").innerHTML = "new password and re-enterd new password should be same";
      document.getElementById("error").removeAttribute("hidden");
    }

    
  })
 
</script>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

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