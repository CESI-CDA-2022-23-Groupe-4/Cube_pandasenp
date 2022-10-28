<?php

require('actions/database.php');

$getAllAnswersOfThisQuestion = $bdd->prepare('SELECT author_id, author_username, question_id, content FROM answers WHERE question_id = ? ORDER BY id DESC');
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion)); 