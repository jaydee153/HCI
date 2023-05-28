

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
    <section>
        <div class="container mt-3 pt-3" id="register" style="margin-left: 38%;">
            <div class="row">
                <div class="col-12 col-md-6 col-sm-8 n-auto">
                    <div class="col-md-6">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h2 class="text-center">Register
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </h2>

                                <form @submit="register" class="adminform">
                                    <label>Name</label>
                                    <input type="text" class="form-control my-4 py-2" placeholder="Name" name="name">
                                    <label>Email</label>
                                    <input type="text" class="form-control my-4 py-2" placeholder="Name" name="email">
                                    <label>Address</label>
                                    <input type="text" class="form-control my-4 py-2" placeholder="Name" name="address">
                                    <label>Password</label>
                                    <input type="password" class="form-control my-4 py-2" placeholder="Name" name="password">
                                    <div class="text-center nt-3">
                                        <input type="submit" class="btn btn-primary" value="Register">
                                        <h2>Already have an Account</h2><a href="Login.php" class="nov-link">Click Here?</a>
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
    <script src="../Assets/vue.3.js"></script>
</html>