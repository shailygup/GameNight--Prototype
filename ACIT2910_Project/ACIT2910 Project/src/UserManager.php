<?php

//require_once('./DBConnector.php');

//$um = new UserManager();

// Facade
class UserManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function getUserProfile($userName) {

        $sql = "SELECT customerName, email, username, password, gender,private, pic FROM user WHERE username = 
    '$userName'";
        $rows = $this->db->query($sql);
        return $rows;
    }


    public function getCoverPhoto($userName) {

        $sql = "SELECT coverPic FROM user WHERE username = 
    '$userName'";
        $rows = $this->db->query($sql);
        return $rows;
    }


    public function getFriends() {
        $sql = "SELECT name, pic FROM friends";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function listUsers() {
        $sql = "SELECT customerName, email, username, password, gender, private FROM user";
        $rows = $this->db->query($sql);
        return $rows;
    }

    







    public function updateProfile($login, $newName, $newEmail, $newGender, $private) {
        $sql = "UPDATE user SET customerName = '$newName', email = '$newEmail', gender = '$newGender', private = '$private' WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    public function updateProfilePic($login, $pic) {
        $sql = "UPDATE user SET pic = 'Style/Images/$pic' WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }


    public function updateCoverPic($login, $Cpic) {
        $sql = "UPDATE user SET coverPic = 'Style/Images/$Cpic' WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
     public function updateName($login, $name) {
        $sql = "UPDATE user SET customerName = '$name' WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    public function updateEmail($login, $email) {
        $sql = "UPDATE user SET email = '$email' WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    public function updateGender($login, $gender) {
        $sql = "UPDATE user SET gender = '$gender' WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    public function updatePrivacy($login, $private) {
        $sql = "UPDATE user SET private = '$private' WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    public function updatePassword($login, $password) {
        $sql = "UPDATE user SET password = MD5('$password') WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }







    public function deleteUser($login) {
        $sql = "DELETE FROM user WHERE username = '$login'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }

    public function addUser($Name, $userName, $email, $password, $gender) {

        $sql = "INSERT INTO user (customerName, email, username, password, gender, pic)
            VALUES ('$Name', '$email', '$userName', MD5('$password'), '$gender', 'Style/Images/profile.png')";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }

    public function findUser($usr, $pwd) {
        $params = array(":usr" => $usr, ":pwd" => $pwd);
        $sql = "SELECT * FROM user WHERE username = :usr AND password = :pwd";

        $rows = $this->db->query($sql, $params);
        if(count($rows) > 0) {
            return $rows[0];
        }

        return null;
    }


}

?>
