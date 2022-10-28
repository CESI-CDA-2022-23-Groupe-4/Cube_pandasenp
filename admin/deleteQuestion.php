<?php
	include '../actions/database.php';
	session_start();
	if(!$_SESSION['admin']) {
		header('Location: connection.php');
	}
	if(isset($_GET['id']) AND !empty($_GET['id'])) {

		$questionsReq = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
		$questionsReq->execute(array($_GET['id']));

		if($questionsReq->rowCount() > 0) {
			
			$getID = htmlspecialchars($_GET['id']);
			$deleteQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
			$deleteQuestion->execute(array($_GET['id']));
			header('Location: questions.php');

		} else {
			echo "Aucun membre trouvé";
		}	
	} else {
		echo "L'identifiant n'a pas pu être récupéré";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Supprimer une question</title>
	<?php include '../includes/head.php'; ?>
</head>
<body>

</body>
</html>