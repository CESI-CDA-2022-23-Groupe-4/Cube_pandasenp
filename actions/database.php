<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=cube_1_forum;charset=utf8;', 'root', 'root');
    }catch(PDOException $e){
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }
