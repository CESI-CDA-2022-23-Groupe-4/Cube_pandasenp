<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])){

    // Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['username']) AND !empty($_POST['last_name']) AND !empty($_POST['first_name']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd2'])){

        if($_POST['pwd'] == $_POST['pwd2']) {

            // Données de l'utilisateur
            $user_username = htmlspecialchars($_POST['username']);
            $user_lastname = htmlspecialchars($_POST['last_name']);
            $user_firstname = htmlspecialchars($_POST['first_name']);
            $user_email = htmlspecialchars($_POST['email']);
            $user_password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

            // Vérifier si l'utilisateur existe déjà sur le site
            $checkIfUserAlreadyExists = $bdd->prepare('SELECT username FROM users WHERE username = ?');
            $checkIfUserAlreadyExists->execute(array($user_username));

            if($checkIfUserAlreadyExists->rowCount() == 0){
                
                // Insérer l'utilisateur dans la bdd
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(username, last_name, first_name, email, pwd)VALUES(?, ?, ?, ?, ?)');
                $insertUserOnWebsite->execute(array($user_username, $user_lastname, $user_firstname, $user_email, $user_password));

                // Récupérer les informations de l'utilisateur
                $getInfosOfThisUserReq = $bdd->prepare('SELECT id, username, last_name, first_name, email FROM users WHERE last_name = ? AND first_name = ? AND username = ?');
                $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_username, $user_email));

                $usersInfos = $getInfosOfThisUserReq->fetch();

                // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['last_name'] = $usersInfos['last_name'];
                $_SESSION['first_name'] = $usersInfos['first_name'];
                $_SESSION['username'] = $usersInfos['username'];
                $_SESSION['email'] = $usersInfos['email'];

                // Rediriger l'utilisateur vers la page d'accueil
                header('Location: index.php');

            } else{
                $errorMsg = "Veuillez modifier les identifiants entrés..";
            }
            
        } else { 
            $errorMsg = "Veuillez entrer des mots de passe identiques..";
        }
    
    } else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}