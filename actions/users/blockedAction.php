<?php

require('actions/database.php');

if(isset($_SESSION['auth'])) {

    $reqUser = $bdd->prepare("SELECT * FROM users WHERE username = ?");     
    $reqUser->execute(array($_SESSION['username']));            

    while($userAccount = $reqUser->fetch()) {

        if($userAccount['blocked'] == 1) {
            header('location: actions/users/logoutAction.php'); 
            exit();    
        }

    }

}