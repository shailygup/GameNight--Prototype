<?php

//require_once('./DBConnector.php');

//$um = new UserManager();

// Facade
class EventManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }
    public function addEvent($Name, $location, $sdate, $edate, $stime, $etime, $members) {
        $memberString = implode(" , ", $members);

        $sql = "INSERT INTO events (eventName, location, eventStartDate, eventEndDate, eventStartTime, eventEndTime, member)
            VALUES ('$Name', '$location', '$sdate', '$edate','$stime', '$etime', '$memberString')";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }

    public function getEvent() {

        $sql = "SELECT eventName, eventStartDate, eventEndDate, eventStartTime, eventEndTime FROM events";
        $rows = $this->db->query($sql);
        return $rows;
    }
}
?>
