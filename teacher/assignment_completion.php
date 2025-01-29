<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());

$id = $_SESSION['uname'];
$fetch = $fun->fetchAllStudent();
$class = $fun->fetchAllSection();

$tc = array();
$teacher_courses = $fun->fetchCourseTeacher($id);

if (mysqli_num_rows($teacher_courses) > 0) {
  while ($res = mysqli_fetch_array($teacher_courses)) {
   // print_r($res);
    $id = $res['course_id'];
   // echo $id;
    $tc[$id] = 1;
  }
}

//print_r($tc);

if(isset($_POST['submit'])) {
  $classes = $_POST['class'];
  $courses = $_POST['course'];
  $assign = $_POST['assign'];
  if(empty($classes) || empty($courses) || empty($assign)) {
    header('Location: assignment_completion.php?msg=Enter valid option');
  }

  $assignment = $fun->fetchAssignmentWithId($assign);
  $assign = mysqli_fetch_assoc($assignment);
  $stud = $fun->fetchClassAssignedStudentWithClass($classes); //here
  $course_name = $fun->fetchCourseWithId($courses);
  $c = mysqli_fetch_assoc($course_name);

}

if(isset($_POST['att'])){

  //$course = $_POST['course'];
  //print_r($_POST);
 $assign = $_POST['assign'];
 
  foreach ($_POST['st_status'] as $i => $st_status) {
    
    $stat_id = $_POST['stat_id'][$i-1];
    
    $status = ($st_status == 'yes')?(1):(0);
    $attendance = $fun->addAssignmentComplete( $stat_id,$assign,$status);
    
    
    $att_msg = "Assignment Recorded.";

  }



}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Assignment Complete</title>
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
  ?><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Assignment Complete</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Student</li>
          <li class="breadcrumb-item active">Assignment Completion</li>
        </ol>
      </nav>
    </div>
    <p class="text-center text-danger">
      <?php
      if (isset($_GET['msg'])) {
        echo $_GET['msg'];
      }
    ?>
    </p>
    <p class="text-center text-success">
    <?php  
      if (isset($_POST['att'])) {
        echo $att_msg;
      }
      ?>
    </p>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Assignment Completion</h5>
              <form action="assignment_completion.php" method="POST" class="form">
                <div class="row">

                  <div class="col-sm-6">
                  
                    <select name="class" id="class" class="form-select">
                      <option value="">Select Class</option>
                      <?php
                      if (mysqli_num_rows($class) > 0) {
                        while ($row = mysqli_fetch_array($class)) {
    
                          $dept = $row['dept'];
                          $department = $fun->fetchDepartmentWithId($dept);
                          $dept = mysqli_fetch_assoc($department);
                          $selected =  (isset($_SESSION['class']) && $_SESSION['class'] == $row['class_id'])?('selected'):('');
                          //echo "<option value='".$row['class_id']."' $checked>".$dept['name'].": ".$row['sec']."  ".$row['sem']." </option>   ";
                      
                          ?>
                          <option value="<?php echo $row['class_id'] ?>" <?php $selected?>>
                            <?php echo $dept['name'] . ": " . $row['sec'] . "  " . $row['sem'] ?>
                          </option>
                          <?php
                        }
                      }
                      //echo $class_option
                      
                      ?>
                    </select>
                  </div>
  
                  <div class="col-sm-6">
                    <select name="course" id="course" class="form-select">
                      <option value="">Select Course</option>
                     
                    </select>
   
                  </div>
                    </div>
                  <div class="row mt-2">  
                  <div class="col-sm-8 ">
                    <select name="assign" id="assign" class="form-select">
                      <option value="">Select Assignment</option>
                     
                    </select>
  
                  </div>
                  <div class="col-sm-4 ">
  
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" >
                  </div>
                </div>

              </form>
            <?php 
              if(isset($_POST["submit"])) {
                $section = $fun->fetchSectionWithId($classes);
                $section = mysqli_fetch_assoc($section);
               // print_r($section);
                          
                          $dept = $section['dept'];
                          $department = $fun->fetchDepartmentWithId($dept);
                          $dept = mysqli_fetch_assoc($department);
                          //print_r($dept);
            ?>
              <!-- Table with stripped rows -->
              <div class="table-responsive mt-5" >
              <form action="assignment_completion.php" method="POST">
                <table class="table  ">
                  <thead>

                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Student Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Class</th>
                      <th scope="col">Sem</th>
                      <th scope="col">Course</th>
                      <th scope="col">Description</th>



                      <th scope="col">Complete</th>
                      

                    </tr>
                  </thead>
                  
                  <tbody>
                    <input type="text" name="assign" id="assign" value="<?php echo $assign["assign_id"] ?>" hidden>

                    <?php
                    if (mysqli_num_rows($stud) > 0) {
                      $sr = 1;
                      while ($res = mysqli_fetch_assoc($stud)) {
                          $st = $fun->fetchStudentWithId($res['sid']);

                          $fetch = $fun->fetchAssignmentCompleteWithSidAssign($st['id'],$assign['assign_id']);
                          if(mysqli_num_rows($fetch)>0) {
                            $fetch = mysqli_fetch_assoc($fetch);
                            //print_r($fetch);
                            $present = ($fetch['status'] == 1)?('checked'):('');
                            $absent = ($fetch['status'] == 0)?('checked'):('');
                          }
                          else{
                            $present = '';
                            $absent = 'checked';
                          }
                         //print_r($res);
                    

                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $sr ?>
                          </th>
                          <td>
                            <?php echo $st['id'] ?>
                            <input type="hidden" name="stat_id[]" value="<?php echo $st['id']; ?>"> </td>
                          </td>
                          <td>
                            <?php echo $st['name'] ?>
                          </td>
                          <td>
                            <?php echo ($dept['name'] . ": " . $section['sec'])  ?>
                          </td>
                          <td>
                            <?php echo  ($section['sem'])  ?>
                          </td>
                          <td>
                            <?php echo $c["name"] ?>
                          </td>
                          <td>
                            <?php echo $assign['description']?>
                          </td>
                          
        
                         <td class="d-flex gap-2">
                          <div>
                            
                            <input type="radio" name="st_status[<?php echo $sr; ?>]" id="<?php echo $sr; ?>" class="form-radio" value="yes" <?php echo $present?>>
                            <label for="<?php echo $sr; ?>" class="form-label">Yes </label>
                          
                          </div>
                          <div>
                            <input type="radio" name="st_status[<?php echo $sr; ?>]" id="<?php echo $sr.'a'; ?>" value="no" class="form-radio" <?php echo $absent?>>
                            <label for="<?php echo $sr.'a'; ?>" class="form-label">No</label>

                          </div>
                        </td>
                        </tr>
                        <?php
                        $sr++;
                      }
                    }
                    ?>
                    
                  </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5">
                    <input type="submit" name="att" id="att" class="btn btn-primary">

                </div>
                </form>
              </div>
            <?php }
              ?>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>




  </main><!-- End #main -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
   function getTodayDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = (today.getMonth() + 1).toString().padStart(2, '0');
            const day = today.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Set the current date in all date inputs with the same name
        const dateInputs = document.getElementsByName("date");
        const todayDate = getTodayDate();
        console.log(todayDate);
        for (let i = 0; i < dateInputs.length; i++) {
            dateInputs[i].value = todayDate;
        }
  </script>
<script src="assets/js/scripts.js" type="text/javascript"></script>
  <!-- ======= Footer ======= -->
  <?php
  include "include/footer.php";
  ?>

</body>

</html>