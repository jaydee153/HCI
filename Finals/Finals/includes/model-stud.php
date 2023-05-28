<?php

    session_start();
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exist';
    }

    function login_student(){
        global $con;

        $sid = $_POST['student_id'];
        $last_name = $_POST['last_name'];

        $query = $con->prepare("call sp_login_student(?,?)");
        $query->bind_param('is',$sid,$last_name);
        $query->execute();
        $result = $query->get_result();
        $ret = '';
        while($row = $result->fetch_array()){
            $ret = $row['ret'];
            if($ret == 1){
                $_SESSION['id'] = $row['id'];
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['first_name'] = $row['first_name'];
            }
        }
        echo $ret;
    }


    function payments(){
        global $con;
        $userId = $_SESSION['id'];
        $pay = $_POST['paymenType'];
        $amount = $_POST['amount'];

        $query = $con->prepare("INSERT INTO payment(`paymentType`,`studId`, `amount`, `status`) VALUES (?,'$userId',?,'0')");
        $query->bind_param('ii',$pay,$amount);
        $query->execute();
        $result = $query->get_result();
        if(!$result){
            $query->close();
            $con->close();
            echo "insertPayment";
        }else{
            $query->close();
            $con->close();
            echo "notInsertPayment";
        }
    }

    function invoice(){
        global $con;

        $query = $con->prepare("SELECT * FROM payment");
        $query->execute();
        $result = $query->get_result();
        
    }
?>