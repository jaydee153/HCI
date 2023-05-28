<?php

    session_start();
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function login(){
        global $con;

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = $con->prepare("call sp_login_admin(?,?)");
        $query->bind_param('ss',$email,$password);
        $query->execute();
        $result = $query->get_result();
        $ret = '';
        while($row = $result->fetch_array()){
            $ret = $row['ret'];
            if($ret == 1){
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['name'] = $row['name'];
            }
        }
        echo $ret;
    }
    
    function register(){
        global $con;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);

        $query = $con->prepare("call sp_reg(?,?,?,?)");
        $query->bind_param('ssss',$name,$email,$address,$password);
        $query->execute();
        $result = $query->get_result();
        $data = "";
        while($row = $result->fetch_array())
        {
            $data = $row[0];
        }
        echo $data;
        $query->close();
        $con->close();
    }

    function students(){
        global $con;
        $student_id = $_POST['student_id'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $course = $_POST['course'];
        $yr_sec = $_POST['yr_sec'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $query = $con->prepare("call sp_stud(?,?,?,?,?,?,?,?)");
        $query->bind_param('issssssi',$student_id,$last_name,$first_name,$course,$yr_sec,$email,$address,$status);
        $query->execute();
        $result = $query->get_result();
        $data = "";
        while($row = $result->fetch_array())
        {
            $data = $row[0];
        }
        echo $data;
        $query->close();
        $con->close();
    }

    function getStudents(){
        global $con;
        $query = $con->prepare("SELECT * FROM stud");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row; 
        }
        echo json_encode($data);
    }

    function getStudById(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("SELECT * FROM stud where id = ?");
        $query->bind_param('i',$id);
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function dropStud(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("DELETE FROM stud where id = ?");
        $query->bind_param('i',$id);
        $query->execute();
        $query->close();
        $con->close();
    }

    function updateStud(){
        global $con;
        $id = $_POST['id'];
        $student_id = ($_POST['student_id'] == '' ? '' : $_POST['student_id']);
        $email = $_POST['email'];
        $status = $_POST['status'];
        $query = $con->prepare("call sp_updateStud(?,?,?,?)");
        $query->bind_param('iisi',$student_id,$id,$email,$status);
        $query->execute();
        echo 1;
        $query->close();
        $con->close();
    }
    function getStatus(){
        global $con;
        $query = $con->prepare("call sp_getStatus()");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }
?>