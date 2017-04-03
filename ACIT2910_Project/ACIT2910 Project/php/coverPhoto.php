<?php session_start();

require_once('../init.php');
loadScripts();

    $data = array("status" => "not set!");

    if(Utils::isGET()) {
        $um = new UserManager();
        $theUserName = $_SESSION['username'];
        $rows = $um->getCoverPhoto($theUserName);

        $html = "";
        foreach($rows as $row) {
            $coverPic = $row['coverPic'];

            if($row['coverPic'] == "") {

            $html .= "
                    <img src='Style/Images/game.jpg' alt='Cover Photo' style='width: 100%; height: 220px; margin-top: -30px;'/>                    
                    ";

            } else {

            $html .= "
                    <img src='$coverPic' alt='Cover Photo' style='width: 100%; height: 220px; margin-top: -30px;'/>                    
                    ";
            }
        }
        echo $html;

    } else {
        $data = array("status" => "error", "msg" => "Only GET allowed.");

    }
    return;

    echo json_encode($data, JSON_FORCE_OBJECT);

?>