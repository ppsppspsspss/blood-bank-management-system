<?php

require_once('database.php');

class BloodModel {
    private static $instance;
    private $con;

    private function __construct() {
        $this->con = dbConnection();
    }

    public static function getInstance() {
        if (!BloodModel::$instance) {
            BloodModel::$instance = new BloodModel();
        }
        return BloodModel::$instance;
    }

    public function allbloodreq() {
        $sql = "SELECT userinfo.FirstName, userinfo.LastName, bloodrequest.BloodGroup, bloodrequest.NumberOfBags, bloodrequest.DateOfDonation, bloodrequest.Status, bloodrequest.RequestID FROM userinfo, bloodrequest WHERE userinfo.UserID = bloodrequest.UserID AND bloodrequest.Status='Pending'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function updatebloodinfo($req_id, $id) {
        $sql = "UPDATE bloodrequest SET Status = 'Approved' WHERE RequestID ='$req_id'";
        $result = mysqli_query($this->con, $sql);

        $date = date('Y-m-d');
        $sql1 = "INSERT INTO approvalhistory VALUES('', '$req_id', '$id', '$date')";
        $result = mysqli_query($this->con, $sql1);

        return true;
    }

    public function getAllReqCount($status) {
        $sql = "SELECT COUNT(RequestID) as count FROM bloodrequest WHERE Status = '{$status}'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result)['count'];
    }
}
?>
