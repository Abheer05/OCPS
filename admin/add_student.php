<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';


  $connect=new connect();
  $fun=new fun($connect->dbconnect());
  
  if(isset($_POST['submit']) ){
      $id=trim($_POST['id']);
      $name = $_POST["name"];
      $fname = $_POST["fname"];
      $mname = $_POST["mname"];
      $email = $_POST["email"];
      $address = $_POST["address"];
      $pmobile = $_POST["pmobile"];
      $fmobile = $_POST["fphone"];
      $mmobile = $_POST["mmobile"];
      $gender = $_POST["gender"];
      $religion = $_POST["religion"];
      $dob = $_POST["dob"];
 
      $school_ssc = $_POST["school_ssc"];
      $ssc_roll = $_POST["ssc_roll"];
      $ssc_board = $_POST["ssc_year"];
      $ssc_year = $_POST["ssc_year"];
      $ssc_result = $_POST["ssc_result"];
 
      $school_hsc = $_POST["school_hsc"];
      $hsc_roll = $_POST["hsc_roll"];
      $hsc_board = $_POST["hsc_year"];
      $hsc_year = $_POST["hsc_year"];
      $hsc_result = $_POST["hsc_result"];
      $fun->setSession($_POST);
      $check = $fun->checkStudentId($id);

      if($check == true && $gender != ''){
        $fetch = $fun->addStudent($_POST);
        if($fetch){
          $fun->deleteSession();

        }
      }
      else{
        $fetch = false;
      }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Student</title>
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
        <h1>Add Student</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Student</li>
            <li class="breadcrumb-item active">Add Student Details</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Student Form</h5>
                <?php 
                  if(isset($_POST['submit'])){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php 
                      if($fetch){
                        echo "Student Added!";
                      }
                      else{
                        echo "Student already exists or you have not inputed all details!";
                      }
                      ?>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>

                <?php    
                  }
                ?>
              <!-- No Labels Form -->
              <form class="row g-3"  action="add_student.php" method="POST">
                <div class="col-md-12">
                  <h2>Personal Information</h2>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="id" id="id" placeholder="Student Unique Id">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo (isset($_SESSION['name']))?($_SESSION['name']):('')?>" placeholder="Student Name">
                </div>
                <div class="col-md-6">
                   
                  <input type="text" class="form-control" id="fname" name="fname" value="<?php echo (isset($_SESSION['fname']))?($_SESSION['fname']):('')?>" placeholder="Father name">
                </div>
                <div class="col-md-6">
                   
                  <input type="text" class="form-control" id="mname" name="mname" value="<?php echo (isset($_SESSION['mname']))?($_SESSION['mname']):('')?>" placeholder="Mother name">
                </div>
                <div class="col-md-6">
                
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($_SESSION['email']))?($_SESSION['email']):('')?>" placeholder="Email">
                </div>
                <div class="col-md-6">
                
                  <textarea type="text" class="form-control" id="address" name="address" value="<?php echo (isset($_SESSION['address']))?($_SESSION['address']):('')?>" placeholder="Address"></textarea>
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="pmobile" name="pmobile" value="<?php echo (isset($_SESSION['pmobile']))?($_SESSION['pmobile']):('')?>" placeholder="Personal Mobile">
                </div>
                
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="fphone" name="fphone" value="<?php echo (isset($_SESSION['fphone']))?($_SESSION['fphone']):('')?>" placeholder="Father Mobile">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="mmobile" name="mmobile" value="<?php echo (isset($_SESSION['mmobile']))?($_SESSION['mmobile']):('')?>" placeholder="Mother Mobile">
                </div>
                <div class="col-md-6">
                
                 <select name="gender" id="gender" class="form-select">
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                 </select>
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="religion" value="<?php echo (isset($_SESSION['religion']))?($_SESSION['religion']):('')?>" name="religion" placeholder="Religion">
                </div>
                <div class="col-md-6 ">
                  <label for="dob" class="form-label font-weight-bold">Date of Birth</label>
                  <input type="date" class="form-control" id="dob" value="<?php echo (isset($_SESSION['dob']))?($_SESSION['dob']):('')?>" name="dob" placeholder="Date of Birthday">
                </div>

                <div class="col-md-12">
                  <h2>Education Details</h2>
                </div>

                <div class="col-md-6">

                
                  <input type="text" class="form-control" id="school_ssc" value="<?php echo (isset($_SESSION['school_ssc']))?($_SESSION['school_ssc']):('')?>" name="school_ssc" placeholder="SSC School name">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="ssc_roll" value="<?php echo (isset($_SESSION['ssc_roll']))?($_SESSION['ssc_roll']):('')?>" name="ssc_roll" placeholder="SSC Roll no.">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="ssc_board" value="<?php echo (isset($_SESSION['ssc_board']))?($_SESSION['ssc_board']):('')?>" name="ssc_board" placeholder="SSC Board name">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="ssc_year" value="<?php echo (isset($_SESSION['ssc_year']))?($_SESSION['ssc_year']):('')?>" name="ssc_year" placeholder="SSC Passing Year">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="ssc_result" value="<?php echo (isset($_SESSION['ssc_result']))?($_SESSION['ssc_result']):('')?>" name="ssc_result" placeholder="SSC % obtained">
                </div>
                <div class="col-md-6" >

                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="school_hsc" value="<?php echo (isset($_SESSION['school_hsc']))?($_SESSION['school_hsc']):('')?>" name="school_hsc" placeholder="HSC School name">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="hsc_roll" value="<?php echo (isset($_SESSION['hsc_roll']))?($_SESSION['hsc_roll']):('')?>" name="hsc_roll" placeholder="HSC Roll no.">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="hsc_board" value="<?php echo (isset($_SESSION['hsc_board']))?($_SESSION['hsc_board']):('')?>" name="hsc_board" placeholder="HSC Board name">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="hsc_year" value="<?php echo (isset($_SESSION['hsc_year']))?($_SESSION['hsc_year']):('')?>" name="hsc_year" placeholder="HSC Passing Year">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="hsc_result" value="<?php echo (isset($_SESSION['hsc_result']))?($_SESSION['hsc_result']):('')?>" name="hsc_result" placeholder="HSC % obtained">
                </div>
                <div class="col-md-6">
                  <label for="doj" class="form-label font-weight-bold ">Date of Admission</label>
                  <input type="date" class="form-control" id="doj" value="<?php echo (isset($_SESSION['doj']))?($_SESSION['doj']):('')?>" name="doj" placeholder="Date of Joining">
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

  <!-- ======= Footer ======= -->
<?php 
  include "include/footer.php";
?>

</body>

</html>