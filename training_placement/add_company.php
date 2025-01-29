<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';

  $connect=new connect();
  $fun=new fun($connect->dbconnect());

  if(isset($_POST['submit']) ){
    $name = $_POST['name'];
    $des  = $_POST['des'];
    $min_ssc = $_POST['min_ssc'];
    $min_hsc = $_POST['min_hsc'];
    $min_cgpa = $_POST['min_cgpa'];
    $skills  = $_POST['skills'];
    $date  = $_POST['date'];
    $des = htmlspecialchars($des);
    $result = $fun->addCompany($name,$des,$min_ssc,$min_hsc,$min_cgpa,$skills,$date);
    if($result){
       echo "Done";
       header("Location: add_company.php ");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Company</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php 
    include "include/links.php";
  ?>
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
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
        <h1>Add Company</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Company</li>
            <li class="breadcrumb-item active">Add Company</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company Form</h5>
              <?php 
                  if(isset($_POST['submit'])){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php 
                      if($result){
                        echo "Company Added!";
                      }
                      else{
                        echo "Company already exists!";
                      }
                      ?>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>

                <?php    
                  }
                ?>
              <!-- No Labels Form -->
              <form class="row g-3"  action="add_company.php" method="POST">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" placeholder="Company name">
                </div>
                <div class="col-md-12">
                  <label for="floatingTextarea"> Job Description</label>
                <textarea class="tinymce-editor" name="des">
                <p>Hello World!</p>
                <p>This is TinyMCE <strong>full</strong> editor</p>
              </textarea>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="skills" placeholder="Enter Skills comma Seperated">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="min_ssc" placeholder="Min SSC marks">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="min_hsc" placeholder="Min HSC marks">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="min_cgpa" placeholder="Min CGPA ">
                </div>
                <div class="col-md-6">
                  <label for="date"> Date of arrival</label>
                  <input type="date" id="date" class="form-control" name="date" placeholder="Date ">
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
  <script src="assets/vendor/quill/quill.min.js"></script>

</body>

</html>