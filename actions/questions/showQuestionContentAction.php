<?php

require('actions/database.php');

// Vérifier si l'id de la question est rentrée dans l'URL 
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // Récupérer l'identifiant de la question
    $idOfTheQuestion = htmlspecialchars($_GET['id']);

    // Vérifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        // Récupérer toutes les données de la questions
        $questionsInfos = $checkIfQuestionExists->fetch();

        // Stocker les données de la question dans des variables propres
        $question_title = $questionsInfos['title'];
        $question_content = $questionsInfos['content'];
        $question_author_id = $questionsInfos['author_id'];
        $question_author_username = $questionsInfos['author_username'];
        $question_publication_date = $questionsInfos['publication_date'];
        
    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune question n'a été trouvée";
}