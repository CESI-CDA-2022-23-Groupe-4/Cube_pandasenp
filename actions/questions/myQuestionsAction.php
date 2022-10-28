<?php

require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, title, description FROM questions WHERE author_id = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));