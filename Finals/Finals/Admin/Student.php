<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:../adminLogin/index.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/Styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.css">
    <link rel = "icon" href = "../css/Images/SFS-Logo.png" type = "image/x-icon">
   
</head>
<body>
<div id="students-app">
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
                    <a href="../Admin/Student.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fas fa-user-graduate me-2"></i> Student
                    </a>
                    <a href="../Admin/Payments.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-money-bill-alt me-2"></i> Payments
                    </a>
                    <a href="../Admin/Receipt.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                        <h2 class="fs-2 m-0">Students</h2>
                        <span class="float-end"><?php echo $_SESSION['name'];?></span>
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
                                    <h3 class="fs-2" id="fees">Payments</h3>                                
                                    <a href="../Admin/Payments.php"><button type="button" class="btn btn-outline-primary">View</button></a>
                                </div>
                                <i class="fas fa-money-bill-alt fs-1 primary-text border rounded-full secondary-bg p-3 "></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2" id="fees">Receipts</h3>                                
                                    <a href="../Admin/Receipt.php"><button type="button" class="btn btn-outline-primary">View</button></a>
                                </div>
                                <i class="fas fa-receipt fs-1 primary-text border rounded-full secondary-bg p-3 "></i>
                            </div>
                        </div>
                    </div>
                </div>
    
            <!-- <div class="container-fluid row my-5">
               
                <div class="charts">
                    <canvas id="chart"  class="chart"></canvas>
                </div>
                </div> -->
                <div class="container-fluid row my-5" id="student">
                    <div class="input-group rounded row">
                        <h3 class="fs-4 mb-3 col">List of Students</h3>
                        <div class="col-12 col-lg-3">  
                            <div class="col mt-2 mb-3">
                                <input type="search" v-model="search" @input="searchStud(search)" class="form-control" placeholder="Search Student">
                            </div>
                        </div>
                    </div>
                    <div class="container justify-content-sm-start my-2 mb-2">
                        <button @click="students($event)" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#stadd">Add Student</button>
                    </div>
                    <div class="container">
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
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="tbl" class="text-center">
                                <tr v-for="stud in studs">
                                    <td>{{ stud.student_id }}</td>
                                    <td>{{ stud.last_name }}</td>
                                    <td>{{ stud.first_name }}</td>
                                    <td>{{ stud.course }}</td>
                                    <td>{{ stud.year_sec }}</td>
                                    <td>{{ stud.email }}</td>
                                    <td>{{ stud.address }}</td>
                                    <td>{{ stud.status == 1 ? 'Enrolled' : 'Not Enrolled' }}</td>
                                    <td>
                                        <button @click="dropStud(stud.id)" class="btn  btn-outline-danger me-4">DELETE</button>
                                        <button @click="getStudById(stud.id)" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#updateSt">Update</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>
            <!-- Add Student -->
            <div class="modal fade" tabindex="-1" id="stadd">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content p-4s">
                    <div class="modal-header">
                        <h5>Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form @submit="students" novalidate class="studentform">
                            <input type="number" class="form-control mb-2" required placeholder="Student ID" name="student_id">
                            <input type="text" class="form-control mb-2" required placeholder="Last Name" name="last_name">
                            <input type="text" class="form-control mb-2" required placeholder="First Name" name="first_name">
                            <input type="text" class="form-control mb-2" required placeholder="Course" name="course">
                            <input type="text" class="form-control mb-2" required placeholder="Year & Section" name="yr_sec">
                            <input type="text" class="form-control mb-2" required placeholder="Email" name="email">
                            <input type="text" class="form-control mb-2" required placeholder="Address" name="address">
                            <select name="status" class="form-control" required id="status">
                                <option selected disabled value="0">Status</option>
                                <option value="1">Enrolled</option>
                                <option value="2">Not Enrolled</option>
                            </select><br>
                        
    
                            <button type="submit" class="btn btn-info float-end mt-3">Add</button>
                            <button type="button" class="btn btn-outline-secondary float-end mt-3 me-2" data-bs-dismiss="modal">Cancel</button>
                        </form> 
                    </div>
                    
                  </div>
                </div>
            </div>
            <!-- Update Student-->
            <div class="modal fade" tabindex="-1" id="updateSt">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content p-4s">
                    <div class="modal-header">
                        <h5>Update Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form @submit="updateStud" novalidate class="studform">
                        <input type="number" v-model="student_id" required placeholder="Student Id" class="form-control mb-2" name="student_id">
                        <input type="text" v-model="email" required placeholder="Email" class="form-control mb-2" name="email">
                        <select class="form-select" v-model="status"  name="status">
                          <option selected disabled value="0">Status</option>
                          <option value="1">Enrolled</option>
                          <option value="2">Not Enrolled</option>
                        </select>
                            <button type="submit" class="btn btn-success float-end mt-3">Update</button>
                            <button type="button" class="btn btn-outline-secondary float-end mt-3 me-2" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                    
                  </div>
                </div>
            </div>
    
        </div>
    </div>

</div>


    <script src="../Assets/axios.js"></script>
    <script src="../Assets/vue.3.js"></script>
    <script src="../Assets/student.js"></script>
    <!-- <script src="../Js/chart.js"></script> -->
    <!-- <script src="../Assets/statusChart.js"></script> -->
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

</html>