<?php
	require("./fonctions.php");
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Intranet Hopital Polytech</title>
	<meta charset= "utf-8">
	<link rel = "stylesheet" href = "aesthetic.css" > 
</head>

<body>
	<div id = "header"> 
		<?php 
			CheckUID();
			PrintHeader();
		?>
	</div>

	<div id = "body">
	<?php
		if(!empty($_POST["hospitalServiceToDelete"])){
			DeleteService($_POST["hospitalServiceToDelete"], "accueil");
		}
		else {
			header("Location: ./deleteService.php");
			exit();
		}
	?>

	<h1>Service d'accueil supprimé</h1>

	</div>

<?php
	$_SESSION['action'] = '';
	PrintFooter();
?>
</body>
</html>