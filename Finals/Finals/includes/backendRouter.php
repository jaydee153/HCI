<?php 
    session_start();
    include "backend.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exist';
    }

    function allPayment(){
        $backend = new backend();
        echo $backend->getPayment();
    }  

    function allPaymentId(){
        $backend = new backend();
        echo $backend->doAllPaymentId($_SESSION['student_id']);
    }  
    
    function getpay(){
        $backend = new backend();
        echo $backend->getpay();
    }

    function updateStatus(){
        $backend = new backend();
        echo $backend->appStats($_POST['userId']);
    }

    function declineStatus(){
        $backend = new backend();
        echo $backend->decStats($_POST['userId']);
    }
?>