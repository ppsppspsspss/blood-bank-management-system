<?php

require_once('database.php');

class ScheduleModel {
    private static $instance;
    private $con;

    private function __construct() {
        $this->con = dbConnection();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function allSchedule() {
        $modelInstance = self::getInstance();
        $conn = $modelInstance->con;
        $sql = "SELECT * FROM scheduleinfo";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public static function deleteSchedule($id) {
        $modelInstance = self::getInstance();
        $conn = $modelInstance->con;
        $sql = "DELETE FROM scheduleinfo WHERE ScheduleID='$id'";
        $result = mysqli_query($conn, $sql);
        return true;
    }

    public static function addSchedule($name, $email, $phone, $bloodG, $gender, $donate_date, $addedBy) {
        $modelInstance = self::getInstance();
        $conn = $modelInstance->con;
        $sql = "INSERT INTO scheduleinfo VALUES('', '{$name}', '{$email}', '{$phone}', '{$bloodG}', '{$gender}', '{$donate_date}', '{$addedBy}')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
?>
