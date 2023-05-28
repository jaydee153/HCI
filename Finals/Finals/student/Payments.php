<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:../student/index.php');
    }
    $_SESSION['student_id'];
    $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/Styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.css">
    <link rel = "icon" href = "../Css/Images/SFS-Logo.png" type = "image/x-icon">

    <title>User Dashboard</title>
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
                    <a href="../student/UserDashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard 
                    </a>
                    <a href="../student/Payments.php" class="list-group-item list-group-item-action bg-transparent second-text  active">
                        <i class="fas fa-money-bill-alt me-2"></i> Payments
                    </a>
                    <a href="../student/receipt.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-receipt me-2"></i> Receipts
                    </a>
                    <a href="../student/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" id="btn_logout">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Log Out
                    </a>
                </div>

            </div>

            <!--sidebar ends here-->

            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="col-12  d-flex justify-content-between">
                            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                            <h2 class="fs-2 m-0">Payments</h2>
                            <span class="float-end"><?php  echo $_SESSION['first_name']; ?></span>
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
                                    <h3 class="fs-2" id="fees">Receipts</h3>                                
                                    <a href="Receipt.html"><button type="button" class="btn btn-outline-primary">View</button></a>
                                </div>
                                <i class="fas fa-receipt fs-1 primary-text border rounded-full secondary-bg p-3 "></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h3 class="fs-4 mb-3 mt-4">Payments 
                        
                    <button class="btn btn-outline-success float-end me-5" data-bs-toggle="modal" data-bs-target="#UpdateStudent">Pay</button>
                    </h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead class="text-center w-auto fs-5">
                                <tr>
                                    <th scope="col" width="50">Payments</th>
                                    <th scope="col" width="50">Amount</th>
                                    <th scope="col" width="50">Status</th>
                                </tr>                            
                            </thead>
                            <tbody id="tbl" class="text-center">
                                <tr v-for="pay in allPayment2">
                                    <td>{{ pay.paymentType == 1 ? "Tuition Pay" : pay.paymentType == 2 ? "Miscellaneous" : "Project"  }}</td>
                                    <td>{{ pay.amount }}</td>
                                    <td>{{ pay.status == 0 ? 'Pending' : pay.status == 1 ? 'Approve' : 'Decline'}}</td>
                                </tr>
                            </tbody>
                                                
                            
                        
                        </table>
                    </div>
                </div>  
        </div>
            <div class="modal fade" tabindex="-1" id="UpdateStudent">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-4s">
                    <div class="modal-header">
                        <h5>Pay</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form @submit="payments" novalidate class="payms">
                            <select name="paymenType" class="form-control">
                                <option selected disabled value="0">Payment Type</option>
                                <option value="1">Tuition Fee</option>
                                <option value="2">Miscellaneous</option>
                                <option value="3">Projects</option>
                            </select><br>                          
                            <input type="number" class="form-control mb-2" placeholder="Amount" name="amount">
                            <button type="submit" class="btn btn-primary" value="Submit">Pay</button>
                        </form> 
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/vue.3.js"></script>
    <script src="../Assets/axios.js"></script>
    <script src="../Assets/payment.js"></script>
</body>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.js"></script>
    <script src="../Js/slidebar.js"></script>
</html>