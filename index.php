<?php 
  session_start();
  if (isset($_SESSION["uname"]) ){
    if ( $_SESSION["role"] = "teacher"){
      header("Location: teacher/");
    }
    else if ( $_SESSION["role"] = "student"){
      header("Location: student/");
    }
    else if ( $_SESSION["role"] = "admin"){
      header("Location: admin/");
    }
  } 
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JIT College login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="styles.css">
</head>

<body class="main-bg">
  <!-- Login Form -->
  <div class="container container-fluid mt-0 d-flex flex-column justify-content-center align-items-center " style="height: 100vh;width: 100vw;  ">
  <img src="./images/nit.png" class="img-fluid w-100" alt="">
    <div class="row justify-content-center align-items-center w-100 ">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <?php 
          if(isset($_GET['msg'])){
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $_GET['msg']?>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>

        <?php    
          }
        ?>
      
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Login</h2>
          </div>
          <div class="card-body">
            <form action="login.php" method="POST">
              <div class="mb-4">
                <label for="uname" class="form-label">Username</label>
                <input type="text" name="uname" class="form-control" id="uname" />
              </div>
              <div class="mb-4">
                <label for="pass" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" />
              </div>
              <div class="mb-4">
                <div>
                  <input type="checkbox" name="remember" class="form-check-input" id="remember" />
                  <label for="remember"  class="form-label">Remember Me</label>

                </div>
                
              </div>
              <div class="d-grid"> 
                <button type="submit" name="submit" class="btn text-light font-bolder bg-secondary">Login</button>
              </div>
            </form>

            <div>
                  <a href="registration.php">Student Register Here</a>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>