<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>

    <section>
        <div class="container mt-5 pt-5 " id="login" style="margin-top: 50px; margin-left: 38%;">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 n-auto">
                    <div class="col-md-6">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h2 class="text-center">Login
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                </h2>

                                    <form @submit="login($event)">
                                        <div class="col-mid-12">
                                            <label>Email</label> 
                                            <input type="text" class="form-control my-4 py-2" placeholder="email" name="email">
                                        </div>
                                        <div class="col-12">
                                            <label>Password</label>
                                            <input type="password" class="form-control my-4 py-2" placeholder="Password" name="password">
                                        </div>
                                        <div class="text-center nt-3 col-md-12">
                                            <input type="submit" class="btn btn-primary" value="login"><br>
                                            <a href="register.php" class="nov-link">Register here</a>
                                        </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/vue.3.js"></script>
    <script src="../Assets/axios.js"></script>
    <script src="../Assets/login.js"></script>
</html> -->
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/login.css" rel="stylesheet" >
    <link rel = "icon" href = "./css/Images/sfs-logo.png" type = "image/x-icon">

    <title>Admin Login</title>
  </head>
  <body>
        <div class="container-fluid"  id="login">
            <form class="mx-auto" @submit="login($event)">
            <h4 class="text-center">
                <img src="../css/Images/sfs-logo.png" width="50" height="40" alt="logo" style="background-color: white;">
                Login</h4>
                <div class="mb-3 mt-5">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="text" class="form-control fw-bold" name="email">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control fw-bold" name="password">
                  
                </div>

                <button type="submit" class="btn btn-outline-success mt-5 fw-bold" value="login">Login</button>
              </form>
        </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/vue.3.js"></script>
    <script src="../Assets/axios.js"></script>
    <script src="../Assets/login.js"></script>
</html>