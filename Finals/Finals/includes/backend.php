<?php
require('database.php');
class backend{
    public function getPayment(){
        return $this->getAllPayment();
    }
    public function getpay(){
        return $this->GettingPayment();
    }
    public function appStats($id){
        return $this->appStatus($id);
    }

    public function decStats($id){
        return $this->declineStats($id);
    }
    public function doAllPaymentId($id){
        return $this->allPaymentId($id);
    }

    private function declineStats($id){
        try{
            $db = new database();
            if($db->getStatus()){
                $query = $db->getCon()->prepare('UPDATE `payment` set `status` =  ? where `payment_id`= ?');
                $query->execute(array(2,$id));
                $result = $query->fetch();
                if(!$result){
                    $db->closeConnection();
                    return "Decline!";
                }else{
                    $db->closeConnection();
                    return "NotDecline!";
                }
            }else{
                return "Database Connection";
            }
        }catch(PDOException $th){
            return $th;
        }
    }

    private function appStatus($id){
        try{
            $db = new database();
            if($db->getStatus()){
                $query = $db->getCon()->prepare('UPDATE `payment` set `status` =  ? where `payment_id`= ?');
                $query->execute(array(1,$id));
                $result = $query->fetch();
                if(!$result){
                    $db->closeConnection();
                    return "Updated!";
                }else{
                    $db->closeConnection();
                    return "NotUpdated!";
                }
            }else{
                return "Database Connection";
            }
        }catch(PDOException $th){
            return $th;
        }
    }
    private function getAllPayment(){
        try {
            $db = new database();
            if($db->getStatus()){
                $query = $db->getCon()->prepare('SELECT s.last_name, s.student_id, s.first_name, s.course, s.year_sec, s.email, s.address, p.payment_id, p.paymentType, p.amount, p.status FROM `stud` s INNER JOIN `payment` p on p.studId = s.id');
                $query->execute();
                $result = $query->fetchAll();
                $db->closeConnection();
                return json_encode($result);
            }else{
                return "Database Connection";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function allPaymentId($id){
        try {
            $db = new database();
            if($db->getStatus()){
                $query = $db->getCon()->prepare('SELECT s.last_name, s.student_id, s.first_name, s.course, s.year_sec, s.email, s.address, p.payment_id, p.paymentType, p.amount, p.status FROM `stud` s INNER JOIN `payment` p on p.studId = s.id WHERE s.student_id = ?');
                $query->execute(array($id));
                $result = $query->fetchAll();
                $db->closeConnection();
                return json_encode($result);
            }else{
                return "Database Connection";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function GettingPayment(){
        try {
            $db = new database();
            if($db->getStatus()){
                $query = $db->getCon()->prepare('SELECT * FROM `payment` WHERE `studId` = ?;');
                $query->execute(array($_SESSION['id']));
                $result = $query->fetchAll();
                $db->closeConnection();
                return json_encode($result);
            }else{
                return "Database Connection";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
}
?>