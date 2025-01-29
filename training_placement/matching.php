<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());

$fetch = $fun->fetchCordAll();
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $company = $fun->fetchCompanyWithId($id);
    $comp = mysqli_fetch_assoc($company);
    $skills = explode(",",strtolower($comp["skills"]));
   
    $fetch = $fun->fetchMatchingStudent($comp["min_ssc"],$comp["min_hsc"],$comp["min_cgpa"]);
}
else{
    $comp = null;
    header("Loccation: view_company.php?msg=no student found");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Matching Students</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php
  include "include/links.php";
  ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php
  include_once "include/header.php";
  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  include_once "include/sideBar.php";
  ?>
  <!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>View Matching Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Company</li>
          <li class="breadcrumb-item active">View Matching Students</li>
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
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Matching Student Table</h5>

              
              <div id="courses" class="table-responsive">
                <p>Company: <?= strtoupper($comp["name"])?></p>
              <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

 

 tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  
  color: Black;
}
</style>
                <!-- Table with stripped rows -->
                <table class=" ">
                  <thead>
                    <tr>
                      <th scope="col">Student Id</th>
                      <th scope="col"> Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Contact no.</th>
                      <th scope="col">Skills</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($fetch) > 0) {
                      $i = 1;
                      while ($res = mysqli_fetch_assoc($fetch)) {
                        
                        ?>
                        <tr>
                            <td scope="row">
                                <?php echo $res['student_id']; ?>
                            </td>
                            <td>
                                <?php echo $res['name']; ?>
                            </td>
                            <td scope="row">
                                <?php echo  $res['email']; ?>
                            </td>
                            <td scope="row">
                                <?php echo  $res['personal_mobile']; ?>
                            </td>
                            <td scope="row">
                                <?php echo  $res['skills']; ?>
                            </td>
                            
                           

                           

                        </tr>
                        <?php
                        ++$i;
                      }
                    } else {
                      $courses = null;
                    }
                    ?>
                  </tbody>
                </table>
              </div>

<button class="btn btn-primary" onclick="printDiv()" >Print</button>
            </div>
          </div>

        </div>
      </div>
    </section>
<script>
    function printDiv() { 
            var divContents = document.getElementById("courses").innerHTML; 
            var a = window.open('', '','height=1000, width=1000'); 
            a.document.write('<html>'); 
            a.document.write('<body > '); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
</script>



  </main><!-- End #main -->
  
  <!-- ======= Footer ======= -->
  <?php
  include "include/footer.php";
  ?>

</body>

</html>