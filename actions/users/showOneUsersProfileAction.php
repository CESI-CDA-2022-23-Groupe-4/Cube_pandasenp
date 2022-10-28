<?php

require('actions/database.php');

// Récupérer l'identifiant de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // id de l'utilisateur
    $idOfUser = htmlspecialchars($_GET['id']);

    // Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT username, last_name, first_name FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){
        
        // Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();

        $user_username = $usersInfos['username'];
        $user_lastname = $usersInfos['last_name'];
        $user_firstname = $usersInfos['first_name'];

        // Récupérer toutes les questions publiées par l'utilisateur
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE author_id = ? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));

    }else{
        $errorMsg = "Aucun utilisateur trouvé";
    }

}else{
    $errorMsg = "Aucun utilisateur trouvé";
}