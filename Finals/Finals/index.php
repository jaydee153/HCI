<?php
    session_start();
    if(isset($_SESSION['id'])){
        header('location:index.php');
    }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./css/login.css" rel="stylesheet" >
    <link rel = "icon" href = "./css/Images/sfs-logo.png" type = "image/x-icon">

    <title>Student Login</title>
  </head>
  <body>
        <div class="container-fluid"  id="login-student">
            <form class="mx-auto" @submit="login_student($event)">
            <h4 class="text-center">
                <img src="./css/Images/sfs-logo.png" width="50" height="40" alt="logo" style="background-color: white;">
                Login</h4>
                <div class="mb-3 mt-5">
                  <label for="exampleInputEmail1" class="form-label">Student Id</label>
                  <input type="number" class="form-control fw-bold" name="student_id">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control fw-bold" name="last_name">
                  
                </div>

                <button type="submit" class="btn btn-outline-success mt-5 fw-bold">Login</button>
              </form>
        </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/vue.3.js"></script>
    <script src="Assets/axios.js"></script>
    <script src="Assets/studlogin.js"></script>
</html>