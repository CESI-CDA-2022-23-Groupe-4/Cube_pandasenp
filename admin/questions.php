<?php
	include '../actions/database.php';
	session_start();
	if(!$_SESSION['admin']) {
		header('Location: connection.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Afficher les questions</title>
	<?php include '../includes/head.php'; ?>
</head>
<body>
	<?php 
		include '../includes/navbarAdmin.php';
		$questionsReq = $bdd->query('SELECT * FROM questions');

			?>
				<br>
				<div class="container">
					<table class="table table-sm align-middle">
						<caption>Liste des questions</caption>
					  	<thead>
						    <tr>
								<th scope="col">id</th>
								<th scope="col">Title</th>		
								<th scope="col">Description</th>	
								<th scope="col">Content</th>
								<th scope="col">Author ID</th>
								<th scope="col">Author Username</th>
								<th scope="col">Publication Date</th>
								<th scope="col">Modifier</th>
								<th scope="col">Supprimer</th>
						    </tr>
						</thead>
						<tbody>
					    	<?php while($questions = $questionsReq->fetch()) { ?>
						    		<tr>
						    			<th scope="row"><?= $questions['id'] ?></th>
						    			<td><?= $questions['title'] ?></td>
						    			<td><?= $questions['description'] ?></td>
						    			<td><?= $questions['content'] ?></td>
						    			<td><?= $questions['author_id'] ?></td>
						    			<td><?= $questions['author_username'] ?></td>
						    			<td><?= $questions['publication_date'] ?></td>
						    			<td><a href= "editQuestion.php?id=<?= $questions['id'] ?>" class="btn btn-warning">Modifier la question</a></td>
						    			<td><a href= "deleteQuestion.php?id=<?= $questions['id'] ?>" class="btn btn-danger">Supprimer la question</a></td>
					    			</tr>
						    <?php  } ?>
					  </tbody>
					</table>
				</div>
            <?php    

	?>

</body>
</html>