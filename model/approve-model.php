<?php

require_once('../model/database.php');

class ApproveModel {
    private static $instance;
    private $conn;

    private function __construct() {
        $this->conn = dbConnection();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function allapprovedreq($id) {
        $sql = "SELECT userinfo.FirstName, userinfo.LastName, bloodrequest.BloodGroup, bloodrequest.NumberOfBags, bloodrequest.RequestID, bloodrequest.UserID, approvalhistory.ApprovalDate FROM approvalhistory, bloodrequest, userinfo WHERE userinfo.UserID = bloodrequest.UserID AND approvalhistory.RequestID = bloodrequest.RequestID AND approvalhistory.UserID = '$id'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}

?>
