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
		# Following lines execute only after patient.php submitted from addPatient, addPatientIntervention, ou updatePatient
		if (isset($_POST['pathology'])) {
			if ($_SESSION['action'] == 'updatePatient') {
				print('uuu');
				$arrayPatient=array('ssNumber' => $_SESSION['patientID'],
				'pathology' => $_POST['pathology'], 
				'emergencyLevel' => $_POST['emergencyLevel']);
				print_r($arrayPatient);
				UpdatePatient($arrayPatient['ssNumber'], $arrayPatient);
				header('Location: ./patientUpdated.php');
				}
			if (CheckPatient($_POST)) {
				AddPatient($_POST);
				if ($_SESSION['action'] == 'addPatient') {
					header('Location: ./patientUpdated.php');
				}
				elseif ($_SESSION['action'] == 'emergencyWithNewPatient') {
					header('Location: ./emergencyDone.php');
				}
				elseif ($_SESSION['action'] == 'addPatientIntervention') 
				{
					$_SESSION['patientID'] = $_POST['ssNumber'];
					header('Location: ./askIntervention.php');
				}
			}
		}
	?>

	<?php
		if ($_SESSION['action'] == 'addPatient' 
			OR $_SESSION['action'] == 'addPatientIntervention' 
			OR $_SESSION['action'] == 'emergencyWithNewPatient') {
			echo '<h1>Rédaction de fiche patient</h1>' . "\n";
			echo '<form action="patient.php" method="post">'. "\n";
		}
		elseif ($_SESSION['action'] == 'searchPatient' 
			OR $_SESSION['action'] == 'addIntervention'
			OR $_SESSION['action'] == 'emergencyWithExistingPatient') {
			echo '<h1>Recherche de patient</h1>'. "\n"; 
			echo '<form action="resultsPatient.php" method="post">'. "\n";
		}
		elseif ($_SESSION['action'] == 'updatePatient') {
			$array = array('name' => "",
			'surname' => "", 
			'ssNumber' => $_SESSION['patientID'], 
			'gender' => '', 
			'birthday' => '',
			'pathology' => '', 
			'emergencyLevel' => '');
			$infosPatient = searchPatient($array);
			$infoPatient = $infosPatient[0];
			print '<h1>Mise-à-jour de fiche patient</h1>' . "\n";
			print '<p> Nom : '.$infoPatient['surname'].'</p>';
			print '<p> Prénom : '.$infoPatient['name'].'</p>';
			print '<p> Sexe : '.$infoPatient['gender'].' <p>'; 
			print '<p> Numéro de sécurité sociale '.$infoPatient['ssNumber'].'</p> ';
			print '<p> Date de naissance : '.$infoPatient['birthday'].' </p>'; 
			echo '<form action="patient.php" method="post">'. "\n";
		}
		else {
			header('Location: ./index.php');
		}

		if ($_SESSION['action'] == 'addPatient' 
			OR $_SESSION['action'] == 'addPatientIntervention' 
			OR $_SESSION['action'] == 'emergencyWithNewPatient'
			OR $_SESSION['action'] == 'searchPatient' 
			OR $_SESSION['action'] == 'addIntervention'
			OR $_SESSION['action'] == 'emergencyWithExistingPatient'){
				echo "<p> Nom <input type=\"text\" name=\"surname\"/> </p>";
				echo "<p> Prénom <input type=\"text\" name=\"name\" /> </p>";
				#Pour le sexe, menu déroulant 
				echo "<p> Sexe <select name=\"gender\"> 
						<option value=\"F\"> Femme </option> 
						<option value=\"H\"> Homme </option>
						</select> <p>"; 
				echo "<p> Numéro de sécurité sociale <input type=\"text\" name=\"ssNumber\" maxlength=\"15\"/> </p> ";
				#Date
				echo "<p> Date de naissance <input type=\"date\" name=\"birthday\"/> </p>"; 
				#Pour la pathologie : menu déroulant 
				echo "<p> Pathologie <select name = \"pathology\"> "; 
					$array = ReturnPathology(); 
					$i = 0; 
					while ($i < count($array)){
						print("<option value = \"$array[$i]\">".$array[$i]."</option>"); 
						$i=$i+1;
					 }
				echo "</select> </p>";
				echo "<p> Niveau d'urgence <input type=\"number\" name=\"emergencyLevel\" min=\"0\" max=\"10\"/> </p>";
			}
			elseif ($_SESSION['action'] == 'updatePatient') {
				#Pour la pathologie : menu déroulant 
				echo "<p> Pathologie <select name = \"pathology\"> "; 
					$array = ReturnPathology(); 
					$i = 0; 
					while ($i < count($array)){
						print("<option value = \"$array[$i]\">".$array[$i]."</option>"); 
						$i=$i+1;
					 }
				echo "</select> </p>";
				echo "<p> Niveau d'urgence <input type=\"number\" name=\"emergencyLevel\" min=\"0\" max=\"10\"/> </p>";
			}
	?>
        <input type="submit" value="Valider" /><br>
    </form>

    </div>
</body>

<?php
	PrintFooter();
?>

</html>