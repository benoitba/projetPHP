<?php
	require("./fonctions.php");
	session_start();
?>

<!DOCTYPE html>
<html>

<<head>
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
		if (isset($_POST['updatePatient'])) {
			if (!empty($_POST['patient_idx'])){
				$_SESSION['action'] = 'updatePatient';
				$_SESSION['patientID'] = $_POST['patient_idx'];
				header('Location: ./patient.php');
				exit();
			} 			
		}
		elseif (isset($_POST['deletePatient'])) {
			if (!empty($_POST['patient_idx'])){
				DeletePatient($_POST['patient_idx']);
				header('Location: ./patientUpdated.php');
				exit();
			}
		}
		elseif (isset($_POST['choosePatientIntervention'])) {
			$_SESSION['patientID'] = $_POST['patient_idx'];
			$_SESSION['action'] = '';
			header('Location: ./askIntervention.php');
			exit();
		}
		elseif (isset($_POST['choosePatientEmergency'])) {
			if (!empty($_POST['patient_idx'])){
				$_SESSION['patientID'] = $_POST['patient_idx'];
				header('Location: ./emergencyDone.php');
				exit();
			}
		}
		elseif (isset($_POST['addPatientIntervention'])) {
			print("ok");
			$_SESSION['action'] = 'addPatientIntervention';
			header('Location: ./patient.php');
			#exit();
		}
	?>

	<h1>Résultats de la recherche de patient</h1>

	<?php
		if ($_SESSION['action'] =='searchPatient' 
			OR $_SESSION['action'] == 'emergencyWithExistingPatient'
			OR $_SESSION['action'] == 'addIntervention' ){
			if(empty($_POST['ssNumber'])){
				header('Location: ./patient.php');
				exit();
			}
			else {
				echo '<form action="resultsPatient.php" method="post">';
				$patients_array=SearchPatient($_POST);
			}
			
			if (!empty($patients_array)) {
				foreach ($patients_array as $idx => $info_array) {
					echo '<input type="radio" name="patient_idx" value="' . $info_array['ssNumber'] . '">' ;
					foreach ($info_array as $info => $value) {
						echo $value . '  ';
					}
				}
				if ($_SESSION['action'] == 'searchPatient') {
					echo '<br><input type="submit" name="updatePatient" value="Modifier patient" /><br>' . "\n";
					echo '<input type="submit" name="deletePatient" value="Supprimer patient" /><br>' . "\n";
				}
				elseif ($_SESSION['action'] == 'addIntervention') {
					echo '<br><input type="submit" name="choosePatientIntervention" value="Selectionner ce patient" /><br>' . "\n";
				}
				elseif ($_SESSION['action'] == 'emergencyWithExistingPatient') {
					echo '<br><input type="submit" name="choosePatientEmergency" value="Choisir le patient sélectionné" /><br>' . "\n";
				}
			}

			if ($_SESSION['action'] == 'addIntervention') {
				echo '<input type="submit" name="addPatientIntervention" value="Créer un patient" /><br>' . "\n";
			}
			echo '</form>';
		}
	?>

	</div>

<?php
	PrintFooter();
?>
</body>
</html>