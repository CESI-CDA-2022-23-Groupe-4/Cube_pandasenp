<?php

include '../actions/database.php';

// Vérifier si l'id de la question est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = htmlspecialchars($_GET['id']);

    // Vérifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        // Récupérer les données de la question
        $questionInfos = $checkIfQuestionExists->fetch();
            
            $question_title = $questionInfos['title'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['content'];

            $question_description = str_replace('<br />', '', $question_description);
            $question_content = str_replace('<br />', '', $question_content);

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune question n'a été trouvée";
}
// Validation du formulaire
if(isset($_POST['validate'])){

    // Vérifier si les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){

        //Les données à faire passer dans la requête
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));
        
        //Modifier les informations de la question qui possède l'id rentré en paramètre dans l'URL
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET title = ?, description = ?, content = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));

        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: questions.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include '../includes/head.php'; ?>
<body>
    <?php include '../includes/navbarAdmin.php'; ?>

    <br><br>
    <div class="container">
        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
        
        <?php 
            if(isset($question_content)){ 
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                        <input type="text" class="form-control" name="title" value="<?= $question_title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description de la question</label>
                        <textarea class="form-control" name="description"><?= $question_description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                        <textarea type="text" class="form-control" name="content"><?= $question_content; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
                </form>
                <?php
            }
        ?>
        

    </div>
    

</body>
</html>