<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';

  $connect=new connect();
  $fun=new fun($connect->dbconnect());

  if(isset($_POST['submit']) ){
    $name = $_POST['name'];
    $code  = $_POST['code'];
    $type  = $_POST['type'];
    $result = $fun->addCourse($name,$code,$type);
    if($result){
       echo "Done";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Course</title>
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
        <h1>Add Course</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">curriculum</li>
            <li class="breadcrumb-item active">Add Course</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Course Form</h5>
              <?php 
                  if(isset($_POST['submit'])){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php 
                      if($result){
                        echo "Course Added!";
                      }
                      else{
                        echo "Course already exists!";
                      }
                      ?>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>

                <?php    
                  }
                ?>
              <!-- No Labels Form -->
              <form class="row g-3"  action="add_course.php" method="POST">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" placeholder="Course name">
                </div>
                <div class="col-md-6 d-flex gap-5 align-self-center">
                  <label for="" class="fw-bold ">Course Type:</label>
                  <div class="d-flex align-self-center gap-2">
                    <input type="radio" class="form-check-input" name="type" id="theory" value="Theory" placeholder="Type">
                    <label for="theory" class="form-label">Theory</label>

                  </div>
                  <div  class="d-flex align-self-center gap-2">
                    <input type="radio" class="form-check-input" name="type" id="Practical" value="Practical" placeholder="Type">
                    <label for="Practical" class="form-label">Practical</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="code" placeholder="Course Code">
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