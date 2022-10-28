<?php
	session_start();  // Pour échanger des informations sur toutes les pages
	require('../actions/database.php');
	if(isset($_POST['validate'])) {

		if(!empty($_POST['username']) AND !empty($_POST['pwd'])){

			$admin_username = 'admin';

        	$req = $bdd->prepare('SELECT username, pwd FROM users WHERE username = ?');
        	$req->execute(array($admin_username));

			$username = htmlspecialchars($_POST['username']);
			$pwd = htmlspecialchars($_POST['pwd']);

			if($req->rowCount() > 0) {
            
	            // Récupérer les données de l'utilisateur
	            while ($usersInfos = $req->fetch()) {
	            	if($username === $usersInfos['username'] AND password_verify($pwd, $usersInfos['pwd'])) {
					$_SESSION['admin'] = true;
					header('Location: users.php');
					} else {
						echo "Nom d'utilisateur et/ou mot de passe incorrects..";
					}
				}	
	         				
			} else {
				echo "Veuillez remplir tous les champs...";
			}

		}
	}

?>

<!DOCTYPE html>
<html>
<?php include '../includes/head.php'; ?>
<?php include '../includes/navbarAdmin.php'; ?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espace de connexion Administrateur</title>
</head>
<body>
	<br><br>
    <form class="container" method="POST" action="">

        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <br>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="pwd">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Send</button>
    </form>
</body>
</html>


