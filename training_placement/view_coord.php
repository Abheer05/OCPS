<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());

$fetch = $fun->fetchCordAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Co_ordinator</title>
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
      <h1>View Co-ordinator</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">T&P co-ordinators</li>
          <li class="breadcrumb-item active">View Co-ordinator</li>
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
              <h5 class="card-title">Co-ordinator Table</h5>


              <div id="courses" class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Co-ordinator Name</th>
                      <th scope="col">Department Name</th>
                     
                     


                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($fetch) > 0) {
                      $i = 1;
                      while ($res = mysqli_fetch_assoc($fetch)) {

                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $i; ?>
                            </th>
                            <td>
                                <?php echo $res['name']; ?>
                            </td>
                            <th scope="row">
                                <?php echo  $res['dept']; ?>
                            </th>
                            
                           

                            <td>
                                <a href="edit_coord.php?id=<?php echo $res['id']; ?>" class="btn btn-success">Edit</a>
                            </td>
                          <td>
                            <a href="delete.php?coord&id=<?php echo $res['id'] ?>" class="btn btn-danger">Delete</a>

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
  
  <!-- ======= Footer ======= -->
  <?php
  include "include/footer.php";
  ?>

</body>

</html>