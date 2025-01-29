<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());

if(isset($_GET["id"])){

    $fetch = $fun->fetchCompanyWithId($_GET["id"]);
}
else{
    header("Location: view_company.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $fetch["name"]?></title>
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
      <h1><?= $fetch["name"]?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Company</li>
          <li class="breadcrumb-item active"><?= $fetch["name"]?></li>
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
              <h2 class="card-title">Company: <?= $fetch["name"]?></h2>
            <p class="card-text font-weight-bold" >Job Description:</p>
            <div>
              <?= htmlspecialchars_decode($fetch["description"])?>
              <p><span class="font-weight-bold" > Skills Required:</span> <?= $fetch["skills"]?></p>
            </div>

              <div>
                <p> <span class="font-weight-bold" > Min HSC Marks :</span> <span><?= $fetch["min_hsc"]?></span></p>
                <p> <span class="font-weight-bold" > Min SSC Marks : </span><span><?= $fetch["min_ssc"]?></span></p>
                <p> <span class="font-weight-bold" > Min CGPA : </span><span><?= $fetch["min_cgpa"]?></span></p>
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