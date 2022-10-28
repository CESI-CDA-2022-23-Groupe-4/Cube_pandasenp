<?php
	include '../actions/database.php';
	session_start();
	if(!$_SESSION['admin']) {
		header('Location: login.php');
		exit();
	}
	
	// Validation du formulaire (pseudo)
	if(isset($_POST['validate-username'])){
		if(isset($_GET['id']) AND !empty($_GET['id'])) {
			if(!empty($_POST['username'])) {
				$id = htmlspecialchars($_GET['id']);
				$username = htmlspecialchars($_POST['username']);

				$modifyReq = $bdd->prepare('SELECT username FROM users WHERE id = ?');
				$modifyReq->execute(array($_GET['id']));

				if($modifyReq->rowCount() > 0) {
					
					$getID = htmlspecialchars($_GET['id']);
					$modifyUsername = $bdd->prepare('UPDATE users SET username = ? WHERE id = ?');
					$modifyUsername->execute(array($username, $id));
					header('Location: users.php');

				} else {
					$errorMsg = "Pas d'utilisateur";
				}	
			} else {
				$errorMsg = "Veuillez entrer un username";
			}
			
		} else {
			$errorMsg = "L'utilisateur n'a pas pu être récupéré";
		}
	}	

	// Validation du formulaire (pseudo)
	if(isset($_POST['validate-password'])){

		if(isset($_GET['id']) AND !empty($_GET['id'])) {
			
			if(!empty($_POST['pwd']) AND !empty($_POST['pwd2']) AND $_POST['pwd'] == $_POST['pwd2']) {

				$id = htmlspecialchars($_GET['id']);
				$pwd = htmlspecialchars($_POST['pwd']);

	            // Hashage du password
	            $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

				$modifyReq = $bdd->prepare('SELECT pwd FROM users WHERE id = ?');
				$modifyReq->execute(array($_GET['id']));

				if($modifyReq->rowCount() > 0) {
					
					$getID = htmlspecialchars($_GET['id']);
					$modifyUsername = $bdd->prepare('UPDATE users SET pwd = ? WHERE id = ?');
					$modifyUsername->execute(array($pwd_hash, $id));
					header('Location: users.php');

				} else {
					$errorMsg = "Pas d'utilisateur";
				} 

			} else {
					$errorMsg = "Les mots de passe doivent être identiques..";
			} 

		} else {
				$errorMsg = "L'utilisateur n'a pas pu être récupéré";
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modifier les informations</title>
	<?php include '../includes/head.php'; ?>
</head>
<body>
	<?php include '../includes/navbarAdmin.php'; ?>	
	<br><br>
    <form class="container" method="POST" action="">

        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <button type="submit" class="btn btn-primary" name="validate-username">Modify Username</button>
        <br>
        <br>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="pwd">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Retype Password</label>
            <input type="password" class="form-control" name="pwd2">
        </div>
        <button type="submit" class="btn btn-primary" name="validate-password">Modify Password</button>
    </form>
</body>
</html>