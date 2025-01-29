<?php 
  include "connect/db.php";
  include "connect/fun.php";
  include 'include/auth_session.php';

  $connect = new connect();
  $fun=new fun($connect->dbconnect());


  if(isset($_POST['submit'])){
    $sid = $_POST['id'];
   
    $cid = $_POST['class'];
    $fetch = $fun->assignClassStudent($sid,$cid);
    if($fetch){
      echo "Added";
    }
  }

  $fetch = $fun->fetchAllStudent();





  $course_option = "";
  $class_option = "";
 



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Assign Class Student</title>
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
    <div class="pagetitle">
        <h1>Assign Student Class</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Student</li>
            <li class="breadcrumb-item active">Assign Class Student</li>
          </ol>
        </nav>
      </div>
      <p class="text-center text-danger"><?php 
          if(isset($_GET['msg'])){
            echo $_GET['msg'];
          }
      ?></p>
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Assign Student table</h5>
  
                <!-- Table with stripped rows -->
                <div class="table-responsive">
                  <div>

                    <input type="text" class="cd-search table-filter form-control w-25 mb-2 border border-dark rounded-xl" data-table="order-table" placeholder="Item to filter.." />
                  </div>
                    <table class="table  cd-table order-table ">
                        <thead>
                        
                          <tr>
                            <th scope="col">Student Id</th>
                            <th scope="col">Name</th>
                            
                            <th scope="col">Email</th>
                            <th scope="col">Class</th>
                            
                            <th scope="col">Submit</th>
                           
                            
                            
                            
                           
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if(mysqli_num_rows($fetch)>0){
                                $sr = 1;
                                while($res = mysqli_fetch_assoc($fetch)){
                                  $id = $res['id'];
                                  $class = $fun->fetchAllSection();
                                  $assign = $fun->fetchClassAssignedStudentWithId($id);

                                
                        ?>
                          <tr>
                            <form action="assign_stud_section.php" method="POST">

                            
                                  <th scope="row">  
                                    <input type="text" name="id" id="id" value="<?php echo $res['id']?>" hidden>
                                    <?php echo $res['id']?>
                                  </th>
                                  <td><?php echo $res['name']?></td>
                                  <td><?php echo $res['email']?></td>
                                  <td>
                                    <select name="class" id="class" class="form-select">
                                      <option value="">Select Class</option>
                                      <?php 
                                          if(mysqli_num_rows($class)> 0){
                                            while($row = mysqli_fetch_array($class)) {
                                              if($assign != null){
                                                
                                                $checked = ($assign['class_id'] == $row['class_id'])?('selected'):('');
                                                //echo $checked." assign: ".$assign['course_id']." Row: ".$row['course_id'];
                                              }
                                              else{
                                                $checked = '';
                                              }
                                              $dept = $row['dept'];
                                              $department = $fun->fetchDepartmentWithId($dept);
                                              $dept = mysqli_fetch_assoc($department);
                                             //echo "<option value='".$row['class_id']."' $checked>".$dept['name'].": ".$row['sec']."  ".$row['sem']." </option>   ";
                                      ?>
                                            <option value="<?php echo $row['class_id']?>" <?php echo $checked?>><?php echo $dept['name'].": ".$row['sec']."  ".$row['sem']?></option>
                                      <?php
                                            }
                                          }
                                        //echo $class_option
                                      
                                      ?>
                                    
                                    </select>
                                  </td>
                                  
                                  <td>
                                    <input type="submit" name="submit" id="submit" value="submit" class="btn btn-info">
                                  </td>
                            </form>
                            
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
  <script>
    (function() {
	'use strict';

var TableFilter = (function() {
 var Arr = Array.prototype;
		var input;
  
		function onInputEvent(e) {
			input = e.target;
			var table1 = document.getElementsByClassName(input.getAttribute('data-table'));
			Arr.forEach.call(table1, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, filter);
				});
			});
		}

		function filter(row) {
			var text = row.textContent.toLowerCase();
       //console.log(text);
      var val = input.value.toLowerCase();
      //console.log(val);
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = onInputEvent;
				});
			}
		};
 
	})();

  /*console.log(document.readyState);
	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
      console.log(document.readyState);
			TableFilter.init();
		}
	}); */
  
 TableFilter.init(); 
})();
  </script>
  <!-- ======= Footer ======= -->
  <?php 
  include "include/footer.php";
 ?>

</body>

</html>