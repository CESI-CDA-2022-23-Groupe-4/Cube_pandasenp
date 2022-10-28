<?php

require('actions/database.php');

// Valider le formulaire
if(isset($_POST['validate'])){

    // Vérifier si les champs ne sont pas vides
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        
        // Les données de la question
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('Y/m/d');
        $question_author_id = $_SESSION['id'];
        $question_author_username = $_SESSION['username'];

        // Insérer la question sur la question
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(title, description, content, author_id, author_username, publication_date)VALUES(?, ?, ?, ?, ?, ?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_title, 
                $question_description, 
                $question_content,
                $question_author_id, 
                $question_author_username, 
                $question_date
            )
        );
        
        $successMsg = "Votre question a bien été publiée sur le site";
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}