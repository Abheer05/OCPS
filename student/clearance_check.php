<?php
include "connect/db.php";
include "connect/fun.php";
include 'include/auth_session.php';

$connect = new connect();
$fun = new fun($connect->dbconnect());

$id = $_SESSION['uname'];


$result = $fun->fetchAttendanceArray($id);
$course = $result[3];

$faculty = $fun->fetchAllFaculty();


//print_r($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Clearance</title>
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
      <h1> Clearance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Courses</li>
          <li class="breadcrumb-item active">Clearance</li>
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
              <h5 class="card-title">Clearance Teachers table</h5>
              
           
              <!-- Table with stripped rows -->
              <div class="table-responsive " >
         
                <table class="table datatable ">
                  <thead>

                    <tr>
                      <th scope="col">#</th>
                      
                      <th scope="col">Course</th>
                      <th scope="col">Teacher</th>



                      <th scope="col">clearance</th>
                     

                    </tr>
                  </thead>
                  
                  <tbody>
                    

                    <?php
                   
                      $sr = 1;
                      for ($i = 0;$i<sizeof($course);$i++) {
                        $course_id = $course[$i];
                          $c = $fun->fetchCourseWithId($course[$i]);
                          $clearance = $fun->fetchClearanceWithSidCourseId($id,$course_id);
                          $clear = ($clearance != null)?($clearance['clearance']):(0);
                          if(mysqli_num_rows($c) > 0) {
                            $c = mysqli_fetch_assoc($c);
                            $cname = $c['name'];
                        }
                        
                        $tid  = ($clearance != null)?($clearance['tid']):(0);
                        $teacher = $fun->fetchTeacherWithId($tid);
                        $tname = ($teacher != null)?($teacher['name']):("Not found");

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
                                <?php echo  ($clear == 1)?("<p class='text-success'>Cleared</p>"):("<p class='text-danger'>Not Cleared</p>")?>
                         </td>
                          
                          
        
                         
                        </tr>
                        <?php
                        $sr++;
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
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Clearance Faculty table</h5>
              
           
              <!-- Table with stripped rows -->
              <div class="table-responsive " >
         
                <table class="table datatable ">
                  <thead>

                    <tr>
                      <th scope="col">#</th>
                      
                      <th scope="col">Faculty</th>
                      <th scope="col">Name</th>



                      <th scope="col">clearance</th>
                     

                    </tr>
                  </thead>
                  
                  <tbody>
                    

                    <?php
                   
                      $sr = 1;
                      if(mysqli_num_rows($faculty)>0){
                        while($res = mysqli_fetch_assoc($faculty)){
                          $clearance_check = $fun->fetchClearanceWithSidFid($id,$res['id']);
                          
                          $clear =($clearance_check != null)? $clearance_check['clearance']:0;
                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $sr ?>
                          </th>
                          <td>
                            <?php echo $res['role'] ?>
                           </td>
                          </td>
                          <td>
                            <?php echo $res['name'] ?>
                          </td>
                          
                         <td>
                                <?php echo  ($clear == 1)?("<p class='text-success'>Cleared</p>"):("<p class='text-danger'>Not Cleared</p>")?>
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