<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';

  $connect=new connect();
  $fun=new fun($connect->dbconnect());
$id = $_SESSION["uname"];
$result = false;
  if(isset($_POST['submit']) ){
    $sem = $_POST["sem"];
    $skills = strtolower($_POST["skills"]);
    $intern = isset($_POST["internship"])?"1":"0";
    $sem_marks = array();
    $sem_file = array();
    $cgpa = $_POST["total"];
        for($i = 0; $i<8; $i++){
            if(isset($_POST["sem".($i+1)."_marks"])){
                $sem_marks[$i] = $_POST["sem".($i+1)."_marks"];

            }
            else{
                $sem_marks[$i] = 0;
            }
            if(isset($_FILES["sem".($i+1)."_doc"]["name"])){
                $target_dir = "../images/sem/";
                        $target_file = $target_dir .basename($_FILES["sem".($i+1)."_doc"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $name = $target_dir ."sem".($i+1)."_$id.".$imageFileType;
                        $actual_name = "sem".($i+1)."_$id.".$imageFileType;
                        if(move_uploaded_file($_FILES["sem".($i+1)."_doc"]["tmp_name"], $name)){
                            $sem_file[$i] = $actual_name;
                        }
                        else{
                            $sem_file[$i] = "";
                        }
            }
            else{
                $sem_file[$i] = "";
            }

        }
    //  print_r($_POST);
    //  print_r($sem_file);
    if(isset($_FILES["intern_certificate"]["name"])){
        $target_dir = "../images/intern/";
                        $target_file = $target_dir .basename($_FILES["intern_certificate"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $name = $target_dir ."intern_$id.$imageFileType";
                        $actual_name = "intern_$id.".$imageFileType;
                        if(move_uploaded_file($_FILES["intern_certificate"]["tmp_name"], $name)){
                            $intern_file = $actual_name;
                        }
                        else{
                            $intern_file = "";
                        }
    }else{
        $intern_file = "";
    }
    if(isset($_FILES["aadhar"]["name"])){
        $target_dir = "../images/";
                        $target_file = $target_dir .basename($_FILES["aadhar"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $name = $target_dir ."aadhar_$id.$imageFileType";
                        $actual_name = "aadhar_$id.".$imageFileType;
                        if(move_uploaded_file($_FILES["aadhar"]["tmp_name"], $name)){
                            $aadhar = $actual_name;
                        }
                        else{
                            $aadhar = null;
                        }
    }else{
        $aadhar = "";
    }
    $fetch = $fun->addStudentcgpa($id, $sem_marks[0], $sem_marks[1], $sem_marks[2], $sem_marks[3], $sem_marks[4], $sem_marks[5], $sem_marks[6], $sem_marks[7], $skills,$cgpa);
    $doc = $fun->addStudentDoc($id, $sem_file[0], $sem_file[1], $sem_file[2], $sem_file[3], $sem_file[4], $sem_file[5], $sem_file[6], $sem_file[7], $intern_file, $aadhar);
   if($fetch && $doc){
    $result = true;
   }
   else{    
    $result = false;
   }
   
    
  }
  $stud_class = $fun->fetchClassAssignedStudentWithId($id);
    $class_id = ($stud_class != null)?($stud_class['class_id']):(0);
    $class = $fun->fetchClassWithId($class_id);
    $sem = ($class != null) ?($class['sem']):(0);
  $student = $fun->fetchUserWithId($_SESSION["uname"]);
//   $dept = $fun->fetchDepartmentAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Details</title>
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
        <h1>Add Details</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Details</li>
            <li class="breadcrumb-item active">Add Details</li>
          </ol>
        </nav>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Details Form</h5>
              <?php 
                  if(isset($_POST['submit'])){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php 
                      if($result){
                        echo "Details Added!";
                      }
                      else{
                        echo "Details already exists!";
                      }
                      ?>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>

                <?php    
                  }
                ?>
              <!-- No Labels Form -->
              <form class="row g-3"  action="add_details.php" enctype="multipart/form-data" method="POST">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="skills" placeholder="Skills(comma seperated)">
                  <input type="text" name="sem" id="sem" value="<?= $sem ?>" hidden>
                  <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                </div>
               
                <?php 
                    for($i = 0; $i<$sem-1; $i++){
                ?>
                <div class="col-md-6 d-flex align-items-center" >
                    <label for="" class="form-label col-md-2" >Sem <?= $i+1 ?></label>
                    <div class="col-md-5" >
                        <input type="text" name="sem<?= $i+1 ?>_marks" class="form-control" id="sem<?= $i+1 ?>_marks" placeholder="semester <?= $i+1 ?> marks"/>
                    </div>
                    <div class="col-md-5" >
                    <input type="file" name="sem<?= $i+1 ?>_doc" class="form-control" id="sem<?= $i+1 ?>_doc">
                    </div>
                </div>
                <?php        
                    }
                ?>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="total" placeholder="Aggregate CGPA">
                 
                </div>
                <div  class="col-md-6 d-flex align-items-center " >
                    <label for="internship" class="form-label">
                        <input type="checkbox" name="internship" id="internship">
                        Have you done any internship?
                    </label>
                </div>
                <div class="col-md-6" id="certify" hidden >
                    <label for="intern_certificate" class="form-label"> Upload Internship certificate: </label>
                    <input type="file" name="intern_certificate" id="intern_certificate" class="form-control" placeholder="">
                </div>
                <div class="col-md-6"   >
                    <label for="aadhar" class="form-label"> Upload Aadhar: </label>
                    <input type="file" name="aadhar" id="aadhar" class="form-control" placeholder="">
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
<script>
  document.getElementById("internship").addEventListener("change",function(event){
    if(event.target.checked){
      document.getElementById("certify").removeAttribute("hidden");
    }
    else{
      document.getElementById("certify").setAttribute("hidden","");
    }
  })
</script>
  <!-- ======= Footer ======= -->
<?php 
  include "include/footer.php";
?>

</body>

</html>