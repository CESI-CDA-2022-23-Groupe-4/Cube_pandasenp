<?php

require('actions/database.php');

// Récupérer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id, author_id, title, description, author_username, publication_date FROM questions ORDER BY id DESC LIMIT 0,5');

// Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    // La recherche
    $usersSearch = htmlspecialchars($_GET['search']);

    // Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, author_id, title, description, content, publication_date FROM questions WHERE title LIKE "%'.$usersSearch.'%" ORDER BY id DESC');

}