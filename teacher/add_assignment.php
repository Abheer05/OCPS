<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';


  $connect=new connect();
  $fun=new fun($connect->dbconnect());
  $class = $fun->fetchAllSection();
  
  if(isset($_POST['submit'])){
     if($_POST['class']== ''){
      header("Location: add_assignment.php?msg=Please Class");

     }
     else if($_POST['course']== ''){
      header("Location: add_assignment.php?msg=Please Select course");

     }
     else if($_POST['description']== ''){
      header("Location: add_assignment.php?msg=Please write description");

     }
     else{
       $class_id = $_POST["class"];
       $course_id = $_POST["course"];
       $description = $_POST["description"];
       $tid = $_SESSION['uname'];
        $fetch = $fun->addAssignment($class_id,$course_id,$tid,$description);
        try {
                              
          if($fetch){
              //echo "<p class='m-10'>Added!!</p>";
          }
          else{
              throw new Exception("Message:");
          }
        }
        
        //catch exception
        catch(Exception $e) {
           echo "<p class='text-2xl mb-6 mt-0 ml-10 font-bold'>Course already available</p>";
        }

     }
  }
  else{
    
    $fetch = 0;
  }
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Assignment</title>
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
      <?php 
        include "include/sideBar.php";
      ?>
  <!-- ======= Sidebar ======= -->
  
  <!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Assignment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Assigments</li>
            <li class="breadcrumb-item active">Add assignments</li>
          </ol>
        </nav>
      </div>
      <?php 
        if(isset($_GET['msg'])){
          echo "<p class='text-danger'>".$_GET['msg']."</p>";
        }
      ?>
      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Assignment Form</h5>

              <!-- No Labels Form -->
              <form class="row g-3"  action="add_assignment.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                <select name="class" id="class" class="form-select">
                      <option value="">Select Class</option>
                      <?php
                      if (mysqli_num_rows($class) > 0) {
                        while ($row = mysqli_fetch_array($class)) {
    
                          $dept = $row['dept'];
                          $department = $fun->fetchDepartmentWithId($dept);
                          $dept = mysqli_fetch_assoc($department);
    
                          //echo "<option value='".$row['class_id']."' $checked>".$dept['name'].": ".$row['sec']."  ".$row['sem']." </option>   ";
                      
                          ?>
                          <option value="<?php echo $row['class_id'] ?>">
                            <?php echo $dept['name'] . ": " . $row['sec'] . "  " . $row['sem'] ?>
                          </option>
                          <?php
                        }
                      }
                      //echo $class_option
                      
                      ?>
                    </select>
                  </div>
  
                 
                  
                
                
                <div class="col-md-6">
                <select name="course" id="course" class="form-select">
                      <option value="">Select Course</option>
                     
                    </select>
                </div>
                <div class="col-md-6">
                    <textarea name="description" id="description" cols="50" rows="5" placeholder="Enter Description" class="form-control"></textarea>
                </div>

                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                
              </form><!-- End No Labels Form -->

            </div>
          </div>
      </section>


  </main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/js/scripts.js" type="text/javascript"></script>
  <!-- ======= Footer ======= -->
<?php 
  include "include/footer.php";
?>

</body>

</html>