<?php

require('actions/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO answers(author_id, author_username, question_id, content)VALUES(?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['username'], $idOfTheQuestion, $user_answer));

    }

}