<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])){

    // Vérifier si l'utilisateur a bien complété tous les champs
    if(!empty($_POST['username']) AND !empty($_POST['pwd'])){
        
        // Les données de l'utilisateur
        $user_username = htmlspecialchars($_POST['username']);
        $user_password = htmlspecialchars($_POST['pwd']);

        // Vérifier si l'utilisateur existe (si le pseudo est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE username = ?');
        $checkIfUserExists->execute(array($user_username));

        if($checkIfUserExists->rowCount() > 0) {

            // Récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            // Vérifier si le mot de passe est correct et que l'utilisateur n'est pas bloqué
            if(password_verify($user_password, $usersInfos['pwd']) && $user['blocked'] == 0){
            
                // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['last_name'] = $usersInfos['last_name'];
                $_SESSION['first_name'] = $usersInfos['first_name'];
                $_SESSION['username'] = $usersInfos['username'];
                $_SESSION['email'] = $usersInfos['email'];

                // Rediriger l'utilisateur vers la page d'accueil
                header('Location: index.php');
                
            }else{
                $errorMsg = "Impossible de vous authentifier correctement.";
            }

        }else{
            $errorMsg = "Impossible de vous authentifier correctement.";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}