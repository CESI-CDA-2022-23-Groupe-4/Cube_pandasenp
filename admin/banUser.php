<?php
	include '../actions/database.php';
	session_start();
	if(!$_SESSION['admin']) {
		header('Location: connection.php');
	}
	if(isset($_GET['id']) AND !empty($_GET['id'])) {

		$usersReq = $bdd->prepare('SELECT * FROM users WHERE id = ?');
		$usersReq->execute(array($_GET['id']));

		if($usersReq->rowCount() > 0) {
			
			$getID = htmlspecialchars($_GET['id']);
			$banUser = $bdd->prepare('UPDATE users SET blocked = 1 WHERE id = ?');
			$banUser->execute(array($_GET['id']));
			header('Location: users.php');

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
	<title>Bannir un utilisateur</title>
	<?php include '../includes/head.php'; ?>
</head>
<body>

</body>
</html>