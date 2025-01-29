<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';


  $connect=new connect();
  $fun=new fun($connect->dbconnect());

  $dept = $fun->fetchDepartmentAll();
  if(isset( $_POST['submit'] )){
    $department = $_POST['dept'];
    $sec = $_POST['sec'];
    $sem = $_POST['sem'];
    $id = $_POST['id'];
    if($department == '' || $sec == '' || $sem == ''){
      header('Location: view_section.php');
    }
    else{
      $fetch = $fun->updateSection($id,$department, $sec, $sem);
      if($fetch){
        header('Location: view_section.php');
      }
    }
    
    
  }

  if(isset( $_GET['id'] )){
    $id = $_GET['id'];
    $fetch = $fun->fetchSectionWithId($id);
    $sec = mysqli_fetch_assoc($fetch);
  }
  else{
    header('Location: view_section.php');
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Sections</title>
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
        <h1>Edit Section</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Curriculum</li>
            <li class="breadcrumb-item active">Edit Sections</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Section Form</h5>
              <?php 
                  if(isset($_POST['submit'])){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php 
                      if($fetch){
                        echo "Section Edited!";
                      }
                      else{
                        echo "Section already exists!";
                      }
                      ?>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>

                <?php    
                  }
                ?>
              <!-- No Labels Form -->
              <form class="row g-3"  action="edit_section.php" method="POST">
                <div class="col-md-6">
                  <select name="dept" id="dept" class="form-select ">
                    <option value="">Select Department</option>
                    <?php 
                      if(mysqli_num_rows($dept)>0){
                        while($row = mysqli_fetch_assoc($dept)){
                          ?>
                            <option value="<?php echo $row['dept_id']?>" <?php echo ($row['dept_id'] == $sec['dept'])?('selected'):('')?>><?php echo $row['name']?></option>
                          <?php
                        }
                      }
                    ?>
                  </select>
                </div>
                
                <div class="col-md-6">
                  <input type="text" class="form-control" id="sec" name="sec" value="<?php echo $sec['sec']?>" placeholder="Section">
                  <input type="text" class="form-control" id="id" name="id" value="<?php echo $sec['class_id']?>" placeholder="id" hidden>
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="sem" name="sem" value="<?php echo $sec['sem']?>" placeholder="Semester">
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