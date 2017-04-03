<?php

require_once('../init.php');
loadScripts();

    $data = array("status" => "not set!");

    if(Utils::isGET()) {
        $um = new UserManager();
        $rows = $um->getFriends();

        $html = "";
        foreach($rows as $row) {
            $name = $row['name'];
            $pic = $row['pic'];
            $html .= "
                    <div class='col-xs-6' id='friends'>
                        <h4 data-name-name='$name'>$name</h4>
                        <img src='$pic' alt='Picture'  width='70%' class='freImage'/><br/><br/>
                       
                        <input id='msg' class='btn btn-success' type='submit' value='Message'/>
                    </div>
                    ";
        }
        echo $html;

    } else {
        $data = array("status" => "error", "msg" => "Only GET allowed.");

    }
    return;

    echo json_encode($data, JSON_FORCE_OBJECT);

?>