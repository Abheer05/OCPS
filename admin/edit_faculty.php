<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';


  $connect=new connect();
  $fun=new fun($connect->dbconnect());

  
  
  if(isset($_POST['submit'])){
      $tname=trim($_POST['tname']);
      $role=trim($_POST['role']);
      $email =trim($_POST['email']);
      $id = trim($_POST['id']);
      $salary = trim($_POST['salary']);
      if(empty($tname)  || empty($salary) || empty($email) ){
          echo json_encode(array('status'=> '0','message'=> 'Empty Fields'));
      }
      else{
        $fetch = $fun->updateFacultyById($id,$tname,$email,$role,$salary);
        if($fetch){
            header('Location: view_faculty.php');

        }

      }
  }
  if(isset($_GET['id']) ){
    $id=trim($_GET['id']);
    $fetch = $fun->fetchFacultyWithId($id);
    $fetch = mysqli_fetch_assoc($fetch);
  }
  else{
    header('Location: view_faculty.php');
  }
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Faculty</title>
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
        <h1>Edit Faculty</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Faculty</li>
            <li class="breadcrumb-item active">Edit Faculty</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Faculty Form</h5>
               
              <!-- No Labels Form -->
              <form class="row g-3"  action="edit_faculty.php" method="POST">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="tname" value="<?php echo $fetch['name']?>" placeholder="Faculty Name">
                  <input type="text" class="form-control" name="id" placeholder="id" value="<?php echo $fetch['id']?>" hidden>
                </div>
                <div class="col-md-6">
                   
                  <input type="text" class="form-control" id="role" name="role" placeholder="Enter Role" value="<?php echo $fetch['role']?>">
                </div>
                <div class="col-md-6">
                   
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $fetch['email']?>" placeholder="Email">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $fetch['salary']?>" placeholder="Salary">
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