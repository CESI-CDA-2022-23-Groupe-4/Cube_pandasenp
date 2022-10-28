<?php
	include '../actions/database.php';
	session_start();
	if(!$_SESSION['admin']) {
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Afficher les utilisateurs</title>
	<?php include '../includes/head.php'; ?>
</head>
<body>

	<?php 
		include '../includes/navbarAdmin.php';
		$usersReq = $bdd->query('SELECT * FROM users WHERE admin = "0"');

			?>
				<br>
				<div class="container">
					<table class="table table-sm align-middle">
						<caption>Liste des utilisateurs</caption>
					  	<thead>
						    <tr>
								<th scope="col" class="text-center">id</th>
								<th scope="col" class="text-center">Username</th>		
								<th scope="col" class="text-center">Last Name</th>	
								<th scope="col" class="text-center">First Name</th>
								<th scope="col" class="text-center">Ban</th>
								<th scope="col" class="text-center">Modify</th>
								<th scope="col" class="text-center">Blocked</th>
								<th scope="col" class="text-center">Deblock</th>
						    </tr>
						</thead>
						<tbody>
					    	<?php while($users = $usersReq->fetch()) { ?>
						    		<tr>
						    			<th scope="row" class="text-center"><?= $users['id'] ?></th>
						    			<td class="text-center"><?= $users['username'] ?></td>
						    			<td class="text-center"><?= $users['last_name'] ?></td>
						    			<td class="text-center"><?= $users['first_name'] ?></td>
						    			<td class="text-center"><a href= "banUser.php?id=<?= $users['id'] ?>" class="btn btn-danger">Ban user</a></td>
						    			<td class="text-center"><a href= "modify.php?id=<?= $users['id'] ?>" class="btn btn-warning">Modify infos</a></td>
						    			<td class="text-center"><?= $users['blocked'] ?></td>
						    			<td class="text-center"><a href= "deblockUser.php?id=<?= $users['id'] ?>" class="btn btn-success">Deblock user</a></td>
					    			</tr>
						    <?php  } ?>
					  </tbody>
					</table>
				</div>
            <?php    

	?>

</body>
</html>