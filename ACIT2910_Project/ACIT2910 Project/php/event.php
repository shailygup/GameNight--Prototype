<?php

require_once('../init.php');
loadScripts();

    $data = array("status" => "not set!");

    if(Utils::isPOST()) {
    	// post means either to delete or add a user
        $parameters = new Parameters("POST");

        $action = $parameters->getValue('action');

        if($action == 'add') {
            $name = $parameters->getValue('name');
            $location = $parameters->getValue('location');
            $sdate = $parameters->getValue('sdate');
            $stime = $parameters->getValue('stime');
            $edate = $parameters->getValue('edate');
            $etime = $parameters->getValue('etime');
            $member = $parameters->getValue('member');
            
            if(!empty($name) && !empty($location) && !empty($sdate) && !empty($stime) && !empty($edate) && !empty($etime)  && !empty($member)) {
                $data = array("status" => "success", "msg" => "Event added.");
                $um = new EventManager();
                $um->addEvent($name, $location, $sdate, $edate, $stime, $etime, $member);
                $html = "<div class='alert alert-success'>
                                <strong>Event Created. Members will be notified.</strong>
                                <p>Check it on the <a href='./main.php'>calendar</a></p>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                    echo $html;

            } else {
                $html = "<div class='alert alert-danger'>
                                <strong>Please fill in the missing fields.</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                    echo $html;
            }
            //echo json_encode($data, JSON_FORCE_OBJECT);
            return;
        }
    }

?>