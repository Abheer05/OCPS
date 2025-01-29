<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());

$id = $_SESSION['uname'];


$result = $fun->fetchAssignments($id);


//print_r($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Assignments</title>
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

  <!-- ======= Sidebar ======= -->
  <?php
  include "include/sideBar.php";
  ?><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pa3getitle">
      <h1> Assignments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Courses</li>
          <li class="breadcrumb-item active">Assignments</li>
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
    <p class="text-center text-success">
    <?php  
      if (isset($_POST['att'])) {
        echo $att_msg;
      }
      ?>
    </p>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Assignments table</h5>
              
           
              <!-- Table with stripped rows -->
              <div class="table-responsive " >
         
                <table class="table datatable ">
                  <thead>

                    <tr>
                      <th scope="col">#</th>
                      
                      <th scope="col">Course</th>
                      <th scope="col">Teacher</th>



                      <th scope="col">Description</th>
                      <th scope="col">Completion</th>

                    </tr>
                  </thead>
                  
                  <tbody>
                    

                    <?php
                   if(mysqli_num_rows($result) > 0 ) {
                    $sr = 1;
                    while($row = mysqli_fetch_array($result)) {
                        $c = $fun->fetchCourseWithId($row['course_id']);
                        $teacher = $fun->fetchTeacherWithId($row['tid']);
                        $assigned = $fun->fetchAssignmentCompleteWithSidAssign($id,$row['assign_id']);
                        $ass = ($assigned != null) ?($assigned['status']):(0);
                        $tname = ($teacher != null)?($teacher['name']):("Not found");
                        if(mysqli_num_rows($c) > 0) {
                          $c = mysqli_fetch_assoc($c);
                          $cname = $c['name'];
                        }
                        else{
                            $cname = '';
                        }
                        

                    

                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $sr ?>
                          </th>
                          <td>
                            <?php echo $cname ?>
                           </td>
                          </td>
                          <td>
                            <?php echo $tname ?>
                          </td>
                          <td>
                            <?php echo  $row['description']?>
                          </td>
                          <td>
                            <?php echo  ($ass == 1)?("<p class='text-success'>Submitted</p>"):("<p class='text-danger'>Not Submitted</p>")?>
                          </td>
                        
                          
                          
        
                         
                        </tr>
                        <?php
                        $sr++;
                    }
                      }
                    
                    ?>
                    
                  </tbody>
                </table>
              
             
              </div>
          
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>




  </main><!-- End #main -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
   function getTodayDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = (today.getMonth() + 1).toString().padStart(2, '0');
            const day = today.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Set the current date in all date inputs with the same name
        const dateInputs = document.getElementsByName("date");
        const todayDate = getTodayDate();
        console.log(todayDate);
        for (let i = 0; i < dateInputs.length; i++) {
            dateInputs[i].value = todayDate;
        }
  </script>
<script src="assets/js/scripts.js" type="text/javascript"></script>
  <!-- ======= Footer ======= -->
  <?php
  include "include/footer.php";
  ?>

</body>

</html>