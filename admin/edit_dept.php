<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';

  $connect=new connect();
  $fun=new fun($connect->dbconnect());

  if(isset($_POST['submit'])){
    
      $fetch1 = $fun->updateDepartment($_POST['id'],$_POST['dname'],$_POST['intake']);
      if($fetch1){
        header("Location: view_dept.php");
    }
  }
  else{
    
    $fetch1 = 0;
  }
  if(isset($_GET['id'])){
    $fetch = $fun->fetchDepartmentWithId($_GET['id']);
    $fetch = mysqli_fetch_assoc($fetch);
  }
  else{
    $fetch = null;
    header("Location: view_dept.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Department</title>
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
        <h1>Edit Department</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Curriculum</li>
            <li class="breadcrumb-item active">Edit Department</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Department Form</h5>
            <?php 
                if($fetch != null){
            ?>
              <!-- No Labels Form -->
              <form class="row g-3"  action="edit_dept.php" method="POST">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="dname" value="<?php echo $fetch['name']?>">
                  <input type="text" class="form-control" name="id" value="<?php echo $_GET['id']?>" hidden>
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="intake" value="<?php echo $fetch['intake']?>" placeholder="Department intake" >
                </div>
                
                
                
                
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                
              </form><!-- End No Labels Form -->
            <?php 
                }
            ?>
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