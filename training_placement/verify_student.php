<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());

$fetch = $fun->fetchStudentDetails();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Verify Student</title>
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
      <h1>Verify Student</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Verify Student</li>
         
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
              <h5 class="card-title">Student Table</h5>


              <div id="courses" class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Student_id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Sem1</th>
                      <th scope="col">Sem2</th>
                      <th scope="col">Sem3</th>
                      <th scope="col">Sem4</th>
                      <th scope="col">Sem5</th>
                      <th scope="col">Sem6</th>
                      <th scope="col">Sem7</th>
                      <th scope="col">Sem8</th>
                      <th scope="col">Intern</th>
                      <th scope="col">Aadhar</th>

                      <th scope="col" >verify</th>
                    
                     

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($fetch) > 0) {
                      $i = 1;
                      while ($res = mysqli_fetch_assoc($fetch)) {
                        // print_r($res);
                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $i; ?>
                          </th>
                          <th scope="row">
                            <?php echo $res['id']; ?>
                          </th>
                          <td>
                            <?php echo $res['name']; ?>
                          </td>
                          <td>
                            <?php echo $res['sem1']; ?>
                            <a href="../images/sem/<?= $res['sem1_doc']?>" target="_blank">Doc</a>
                          </td>
                          <td>
                            <?php echo $res['sem2']; ?>
                            <a href="../images/sem/<?= $res['sem2_doc']?>" target="_blank">Doc</a>
                          </td>
                          <td>
                            <?php echo $res['sem3']; ?>
                            <a href="../images/sem/<?= $res['sem3_doc']?>" target="_blank">Doc</a>
                          </td>
                          <td>
                            <?php echo $res['sem4']; ?>
                            <a href="../images/sem/<?= $res['sem4_doc']?>" target="_blank">Doc</a>
                          </td>
                          <td>
                            <?php echo $res['sem5']; ?>
                            <a href="../images/sem/<?= $res['sem5_doc']?>" target="_blank">Doc</a>
                          </td>
                          <td>
                            <?php echo $res['sem6']; ?>
                            <a href="../images/sem/<?= $res['sem6_doc']?>" target="_blank">Doc</a>
                          </td>
                          <td>
                            <?php echo $res['sem7']; ?>
                            <a href="../images/sem/<?= $res['sem7_doc']?>" target="_blank">Doc</a>
                          </td>
                          <td>
                            <?php echo $res['sem8']; ?>
                            <a href="../images/sem/<?= $res['sem8_doc']?>" target="_blank">Doc</a>
                          </td>
                          
                          <td>
                            <a href="../images/intern/<?php echo $res['intern']?>" target="_blank">Certificate</a>
                          </td>
                          <td>
                            <a href="../images/<?php echo $res['aadhar']?>" target="_blank">aadhar</a>
                          </td>
                          
                         

                          
                          <td>
                            <a href="verify.php?student&id=<?php echo $res['student_id'] ?>" class="btn btn-success">Verify</a>

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


            </div>
          </div>

        </div>
      </div>
    </section>




  </main><!-- End #main -->
  <script>
    async function myfun(id, status) {
      fetch(`verify.php?course&id=${id}&verify=${status}`)
        .then(res => res.text())
        .then(data => console.log(data));
    }

  </script>
  <!-- ======= Footer ======= -->
  <?php
  include "include/footer.php";
  ?>

</body>

</html>