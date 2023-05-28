<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:index.php');
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/Styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.css">
    <link rel = "icon" href = "../Css/Images/SFS-Logo.png" type = "image/x-icon">

    <title>Admin Dashboard</title>
   
</head>
<body>

    <div id="payment">
        <div class="d-flex" id="wrapper">
            <!--sidebar starts here-->

            <div class="bg-white" id="sidebar-wrapper">
                
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <img src="../Css/Images/SFS-Logo.png" width="50" height="40" alt="logo" > School Fee System
                </div>

                <div class="list-group list-group-flush my-3">
                    <a href="../Admin/Dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard 
                    </a>
                    <a href="../Student.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold ">
                        <i class="fas fa-user-graduate me-2"></i> Student
                    </a>
                    <a href="../Admin/Payments.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-money-bill-alt me-2"></i> Payments
                    </a>
                    <a href="../Admin/Receipt.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fas fa-receipt me-2"></i> Receipts
                    </a>
                    <a href="../adminLogin/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" id="btn_logout">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Log Out
                    </a>
                </div>

            </div>

            <!--sidebar ends here-->

            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="col-12  d-flex justify-content-between">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Receipt</h2>
                        <span class="float-end"><?php  echo $_SESSION['name']; ?></span>
                    </div>    
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>    
                </nav>

                <div class="container-fluid px-4">
                    <div class="row g-3 my-2">
                        <div class="col-md-3">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2" id="student">Student</h3>                               
                                    <a href="Student.php"><button  class="btn btn-outline-primary">View</button></a>
                                    
                                </div>
                                <i class="fas fa-user-graduate fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2" id="fees">Fees</h3>                                
                                    <a href="Payments.php"><button type="button" class="btn btn-outline-primary">View</button></a>
                                </div>
                                <i class="fas fa-money-bill-alt fs-1 primary-text border rounded-full secondary-bg p-3 "></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid row my-5">
                    <div class="input-group rounded row">
                        <h3 class="fs-4 mb-3 col">List of Student's Invoice</h3>
                        <input type="search" v-model="search" @input="searchReceipt(search)" class="form-control ms-5 mb-2 rounded-3 col-sm-6" placeholder="Search Student">
                        </span>
                    </div>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead class="text-center">
                                <tr>    
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Year & Section</th>
                                </tr>
                            </thead>
                            <tbody id="tbl" class="text-center">
                                <tr v-for="invo in invoice">
                                    <td>{{ invo.student_id }}</td>
                                    <td>{{ invo.last_name }}</td>
                                    <td>{{ invo.first_name }}</td>
                                    <td>{{ invo.course }}</td>
                                    <td>{{ invo.year_sec }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>

            

        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="../Assets/vue.3.js"></script>
    <script src="../Assets/axios.js"></script>
    <script src="../Assets/payment.js"></script>
    <script src="../Js/functions.js"></script>
    <script src="../Js/slidebar.js"></script>
</body>
</html>