<?php
session_start();

if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}

else if (isset($_SESSION['auth'])) {

    require('actions/database.php');

    $reqUser = $bdd->prepare("SELECT * FROM users WHERE email = ?");     
    $reqUser->execute(array($_SESSION['email']));                

    while($userAccount = $reqUser->fetch()) {

        if($userAccount['blocked'] == 1) {
            header('location: logout.php'); 
            exit();    
        }

    }

}