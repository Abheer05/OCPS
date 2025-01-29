<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';

  $connect=new connect();
  $fun=new fun($connect->dbconnect());

  if(isset($_POST['submit']) ){
    $name = $_POST['name'];
    $dept  = $_POST['dept'];
    $result = $fun->addCoord($name,$dept);
    
  }
  $dept = $fun->fetchDepartmentAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Co-ordinator</title>
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
        <h1>Add Co-ordinator</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Curriculum</li>
            <li class="breadcrumb-item active">Add Co-ordinator</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Co-ordinator Form</h5>
              <?php 
                  if(isset($_POST['submit'])){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php 
                      if($result){
                        echo "Co-Ordinator Added!";
                      }
                      else{
                        echo "Co-ordinator already exists!";
                      }
                      ?>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>

                <?php    
                  }
                ?>
              <!-- No Labels Form -->
              <form class="row g-3"  action="add_coord.php" method="POST">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" placeholder="Co-ordinator name">
                </div>
                <div class="col-md-6">
                  <select class="form-select" name="dept" id="dept">
                    <option value="">Select Department</option>
                    <?php 
                      if(mysqli_num_rows($dept)> 0){
                        while($row = mysqli_fetch_assoc($dept)){
                          echo "<option value=".$row['name'].">".$row['name']."</option>";
                        }
                      }
                    ?>
                  </select>
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