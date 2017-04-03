<?php
session_start();
/*** begin our session ***/
require_once('../init.php');
loadScripts();
    
        
        $um = new UserManager();
        $errorMessage = "";

        $user = $_POST["user"];
        $password = $_POST["password"];
        $type = 'admin';
        if (isset($_GET["user"]) && !empty($_GET["user"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $user =  $_GET["user"];
        }
        if (isset($_GET["password"]) && !empty($_GET["password"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $password =  $_GET["password"];
        }
        $encrypted_password=md5($password);
        $count = $um->findUser($user, $encrypted_password);

        if($count>0){
            header("location:../main.php");
            // echo $user;
            $_SESSION['username'] = $user;  
            // echo $_SESSION['username'];
            
        }else {
            //header("location:../main.php");
           header("location:../index.php?msg=Invalid_Login+Not_Authorized");


        }
        



?>