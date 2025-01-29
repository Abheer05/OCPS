<?php 
    include "connect/db.php";        
    include 'connect/fun.php';
    include 'include/auth_session.php';

    $connect=new connect();
    $fun=new fun($connect->dbconnect());

    $date = date('d/m/Y');
    
    $id = $_SESSION['uname'];
    $student = $fun->fetchStudentDetails($id);
    if($student!=null){
        
        $name = $student['name'];
        $class  = $fun->fetchClassAssignedStudentWithId($id);
        $class_id = ($class !=null)?($class['class_id']):(0);
        $sem = $fun->fetchClassWithId($class_id);
        $class_teacher = ($sem!=null)?($sem['class_teacher']):(0);
        $sem = ($sem!=null)?($sem['sem']):(null);
        $class_teacher_name = $fun->fetchTeacherWithId($class_teacher);
        $ctname = ($class_teacher_name!=null)?($class_teacher_name['name']):('');
        $teacher_course = $fun->fetchCoursesWithClass($class_id);
        $teacher_course2 = $fun->fetchCoursesWithClass($class_id);
    }
    else{
        $student = null;
        $sem = null;
        $name = '';
        $ctname = '';
    }

    $faculty = $fun->fetchAllFaculty();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Clearance Form </title>
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
    ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clearance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Clearance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
     <?php 
        if($student != null){
    ?>
     
    <div class="card table-responsive" id="divPrint">
        <style>
            table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  
}
table{
    width: 100%;
    height: 30%;
}
#date{
    display: flex;
    justify-content: end;
}
#std,#foot{
    display: flex;
    justify-content: space-between;
}
        </style>
        <div class="card-body mt-2">
        <div class=" ">
            <center>
            <p>NAGPUR INSTITUTE OF TECHNOLOGY, NAGPUR</p>
            <p>DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</p>
            <P>SESSION: 2022-23(EVEN SEMESTER)</P>
            <P>CLEARANCE FORM</P>
            </center>
        </div>
        <!--Date Section-->
        <div class="d-flex justify-content-end" id="date">
            <p>DATE: <?php echo $date;?></p>
        </div>
        <!--Date Section End-->
        <!--Student Info-->
        <div class="d-flex justify-content-between" id="std">
            <p > <b> Name of Student: </b> <?php echo $name ?></p>
            <p> <b> Roll no: </b> <?php echo $id ?> </p>
            <p> <b> Semester: </b> <?php echo $sem ?> </p>
        </div>
        <!--Student Info End-->
        <!--Table 1 start-->
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Section</th>
                        <th>Clearing Authority</th>
                        <th>Date</th>
                        <th>Remark</th>
                        <th>Signature</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td rowspan=""></td>
                        <th colspan="5">Subject</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($teacher_course)>0){
                            $sr = 1;
                            while($res = mysqli_fetch_assoc($teacher_course)){
                                $course_id = $res['course_id'];
                                $teacher_id = $res['tid'];
                                $c = $fun->fetchCourseWithId($course_id);
                          $clearance = $fun->fetchClearanceWithSidCourseId($id,$course_id);
                          $clear = ($clearance != null)?($clearance['clearance']):(0);
                          if(mysqli_num_rows($c) > 0) {
                            $c = mysqli_fetch_assoc($c);
                            $cname = ($c['type'] == 'Theory')? $c['name']:'';
                            if($c['type'] == 'Practical'){
                                continue;
                            }
                        }
                        else{
                            $cname = '';
                        }
                      
                        $teacher = $fun->fetchTeacherWithId($teacher_id);
                        $tname = ($teacher != null)?($teacher['name']):("Not found");
                        
                       
                    ?>
                    <tr>
                        <td><?php echo $sr?></td>
                        <td><?php echo $cname?></td>
                        <td><?php echo $tname?></td>
                        <td><?php echo date("d-m-Y")?></td>
                        <td> <?php echo  ($clear == 1)?("<p class='text-success'>Cleared</p>"):("<p class='text-danger'>Not Cleared</p>")?></td>
                        <td></td>
                    </tr>
                    <?php 
                            $sr++;}
                         }
                    ?>
                   
                    <tr>
                        <td rowspan=""></td>
                        <td colspan="5"><b>Practical</b></td>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($teacher_course2)>0){
                            $sr = 1;
                            while($res = mysqli_fetch_assoc($teacher_course2)){
                                $course_id = $res['course_id'];
                                $teacher_id = $res['tid'];
                                $c = $fun->fetchCourseWithId($course_id);
                          $clearance = $fun->fetchClearanceWithSidCourseId($id,$course_id);
                          $clear = ($clearance != null)?($clearance['clearance']):(0);
                          if(mysqli_num_rows($c) > 0) {
                            $c = mysqli_fetch_assoc($c);
                            $cname = ($c['type'] != 'Theory')? $c['name']:'';
                            if($c['type'] != 'Practical'){
                                continue;
                            }
                        }
                        else{
                            $cname = '';
                        }
                      
                        $teacher = $fun->fetchTeacherWithId($teacher_id);
                        $tname = ($teacher != null)?($teacher['name']):("Not found");
                        
                       
                    ?>
                    <tr>
                        <td><?php echo $sr?></td>
                    <td><?php echo $cname?></td>
                        <td><?php echo $tname?></td>
                        <td><?php echo date('d-m-Y')?></td>
                        <td> <?php echo  ($clear == 1)?("<p class='text-success'>Cleared</p>"):("<p class='text-danger'>Not Cleared</p>")?></td>
                        <td></td>
                    </tr>
                    <?php 
                          $sr++;  }
                        }
                        
                        
                    ?>
                </tbody>
            </table>
        </div>
        <!--Table 1 End-->

        <!--Table 2 Start-->
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Sr. No.</th>
                        <th>Section</th>
                        <th>Clearing Authority</th>
                        <th>Date</th>
                        <th>Remark</th>
                        <th>Signature</th>
                    </tr>

                </thead>
                <tbody>

                
                    <tr>
                        <td rowspan=""></td>
                        <th colspan="5">Teacher Guardian Incharge</th>
                    
                    </tr>
                    <?php 
                    $sr = 1;
                      if(mysqli_num_rows($faculty)>0){
                        while($res = mysqli_fetch_assoc($faculty)){
                          $clearance_check = $fun->fetchClearanceWithSidFid($id,$res['id']);
                          
                          $clear =($clearance_check != null)? $clearance_check['clearance']:0;
                ?>
                    <tr>
                        <td><?php echo $sr?></td>
                        <td><?php echo $res['role']?></td>
                        <td><?php echo $res['name']?></td>
                        <td><?php echo date("d-m-Y")?></td>
                        <td><?php echo  ($clear == 1)?("<p class='text-success'>Cleared</p>"):("<p class='text-danger'>Not Cleared</p>")?></td>
                        <td></td>
                    </tr>
                    <?php 
                        $sr++;
                        }
                     }
                ?>
                    
                    
                </tbody>
            </table>
        </div>
        <!--Table 2 End-->
        <div class="d-flex justify-content-between" id="foot">
            <p></p>
            <p> <b> Class In-charge </b><br><?php echo $ctname?></p>
            <p> <b>Head CSE </b> <br> teacher</p>
           
        </div>
        </div>
    </div>
        <div class="card">
            <div class="card-body mt-3 d-flex justify-content-center">
                <button class="btn btn-primary" onclick="print()" > Print</button>
            </div>
        </div>
        <?php
        }else{
            echo "No data found";
        }
     ?>  

    </section>
<script>
    function print () {
 var printDiv = document.getElementById("divPrint");
 var printWindow = window.open('', '', 'left=0, top=0, width=800, height=500, toolbar=0, scrollbars=0, status=0');
 printWindow.document.write(printDiv.innerHTML);
 printWindow.document.close();
 printWindow.focus();
 printWindow.print();
}
</script>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php 
 include "include/footer.php";
 ?>

</body>

</html>