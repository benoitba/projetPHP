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
	<h1>Intervention créée</h1>

	</div>

<?php
	$_SESSION['action'] = '';
	$_SESSION['intervention'] = ''; 
	$_SESSION['patientID'] = '';
	$_SESSION['EL'] = '';
	PrintFooter();
?>

</body>

</html>