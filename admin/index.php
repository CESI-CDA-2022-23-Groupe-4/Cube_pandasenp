<?php
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
	<title>Accueil</title>
</head>
<?php include '../includes/head.php'; ?>
<body>
	<?php include '../includes/navbarAdmin.php'; ?>

</body>
</html>