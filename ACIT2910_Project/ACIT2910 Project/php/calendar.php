<?php

require_once('../init.php');
loadScripts();

    $em = new EventManager();
    $rows = $em->getEvent();
    $data = "";
    $post_data = array();
    foreach($rows as $row) {
        $name = $row['eventName'];
        $sdate = $row['eventStartDate'];
        $stime = $row['eventStartTime'];
        $edate = $row['eventEndDate'];
        $etime = $row['eventEndTime'];

        $post_data[] = array('title' => $name, 'start' => $sdate."T".$stime, 'end' => $edate."T".$etime);                      
                
        }
       
    

    echo json_encode($post_data);

?>