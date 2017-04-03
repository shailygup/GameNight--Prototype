<?php
  session_start();

require_once('../init.php');
loadScripts();

    $data = array("status" => "not set!");

    if(Utils::isPOST()) {
    	// post means either to delete or add a user
        $parameters = new Parameters("POST");

        $action = $parameters->getValue('action');
        $username = $parameters->getValue('username');

        if($action == 'delete') {

            $um = new UserManager();
            $um->deleteUser($user_name);
            $data = array("status" => "success", "msg" => "User '$user_name' deleted.");
            echo json_encode($data, JSON_FORCE_OBJECT);
            return;

        } else if($action == 'update') {
            $theUserName = $_SESSION['username'];
            
            $newName = $parameters->getValue('newName');
            $email = $parameters->getValue('newEmail');
            $gender = $parameters->getValue('newGender');
            $private = $parameters->getValue('privacy');
            $pic = $parameters->getValue('pic');
            $coverPic = $parameters->getValue('coverPic');
            $newPass = $parameters->getValue('newPassword');
            $data = array($newName, $email, $gender, $private, $pic, $coverPic);
            //echo json_encode($data, JSON_FORCE_OBJECT);
                //this uses a new FUNCTION from the UserManager.php. DONT FORGET TO ADD IT IN
            if(!empty($newName)) {

                $um = new UserManager();
                $count = $um->updateName($theUserName, $newName);
                $html = "<div class='alert alert-success'>
                                <strong>$theUserName your name was changed to $newName</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                echo $html;
            }
            if(!empty($email)) {

                $um = new UserManager();
                $changeEmail = $um->updateEmail($theUserName, $email);
                $html = "<div class='alert alert-success'>
                                <strong>$theUserName your email was changed to $email</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                echo $html;
            }
            if(!empty($private)) {

                $um = new UserManager();
                $changePrivacy = $um->updatePrivacy($theUserName, $private);
                $html = "<div class='alert alert-success'>
                                <strong>$theUserName your privacy was changed to $private</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                echo $html;
            }

            if(!empty($pic)) {

                $um = new UserManager();
                $changePic = $um->updatePic($theUserName, $pic);
            }
            if(!empty($coverPic)) {

                $um = new UserManager();
                $changeCover = $um->updateCover($theUserName, $coverPic);

            }
            if(!empty($newPass)) {

                $um = new UserManager();
                $changeCover = $um->updatePassword($theUserName, $newPass);
                $html = "<div class='alert alert-success'>
                                <strong>Password was changed</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                    echo $html;
            }

                
            //echo shows me what data being sent
            //echo json_encode($data, JSON_FORCE_OBJECT);
            return;
        } else if($action == 'add') {
            $newName = $parameters->getValue('newName');
            $newUserName = $parameters->getValue('newUserName');
            $newEmail = $parameters->getValue('newEmail');
            $newPassword = $parameters->getValue('newPassword');
            $newGender = $parameters->getValue('newGender');
            
            if(!empty($newName) && !empty($newUserName) && !empty($newEmail) && !empty($newPassword) && !empty($newGender)) {
                $data = array("status" => "success", "msg" => "User added.");
                $um = new UserManager();
                $um->addUser($newName, $newUserName, $newEmail, $newPassword, $newGender);
                $html = "<div class='alert alert-success'>
                                <strong>Welcome to the cool group!</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                    echo $html;

            } else {
                $html = "<div class='alert alert-danger'>
                                <strong>Some Fields are empty,please fill all! We are waiting to become friends</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                            </div>
                                ";
                    echo $html;
            }
            //echo json_encode($data, JSON_FORCE_OBJECT);
            return;

        }else {
            $data = array("status" => "fail", "msg" => "Action not understood.");
        }

        //echo json_encode($data, JSON_FORCE_OBJECT);
        return;

    }else if(Utils::isGET()) {
        // get means get the list of users
        $um = new UserManager();
        $theUserName = $_SESSION['username'];
        $rows = $um->getUserProfile($theUserName);
        $html = "";
        if($rows != null) {

            foreach($rows as $row) {
                $name = $row['customerName'];
                $email = $row['email'];
                $username = $row['username'];
                $gender = $row['gender'];
                $privacy = $row['private'];
                $pic = $row['pic'];

                if ($row['pic'] == ""){
                
                $html .= "

                  <div class='profile-header-img'>
                        <img id='example' class='img-circle' src='Style/Images/profile.png' alt='Profile Image'/>
                        <!-- badge -->
                        <div class='rank-label-container'>
                            <span class='label label-default rank-label'>$name</span>
                        </div>
                        <br/>
                        

                    </div>
                     <div class='row'>
                    <strong>Name: </strong>
                    <span >$name </span><br/>
                    <strong>Email: </strong>
                    <span >$email </span><br/>
                    <strong>User Name: </strong>
                    <span >$username </span><br/>
                    <strong>Gender: </strong>
                    <span >$gender </span><br/>
                    <strong>Private: </strong>
                    <span>$privacy </span><br/>
                  </div>

                    
                ";

                } else {               

                $html .= "

                  <div class='profile-header-img'>
                        <img class='img-circle' src='$pic' />
                        <!-- badge -->
                        <div class='rank-label-container'>
                            <span class='label label-default rank-label'>$name</span>
                        </div>
                        
                        

                    </div>
                     <div class='row'>
                    <strong>Name: </strong>
                    <span >$name </span><br/>
                    <strong>Email: </strong>
                    <span >$email </span><br/>
                    <strong>User Name: </strong>
                    <span >$username </span><br/>
                    <strong>Gender: </strong>
                    <span >$gender </span><br/>
                    <strong>Private: </strong>
                    <span>$privacy </span><br/>
                  </div>

                ";
            }
            }
            echo $html;

        } else {
            // shouldn't be but ...
            echo 'The returned rows is "null". No user table perhaps?';
        }

        return;

    }


?>