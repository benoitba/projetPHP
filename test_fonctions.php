<!DOCTYPE html> 
<html>  

	<p> OK </p>

	<?php
	require("C:/xampp/htdocs/Cours_PHP/projetPHP/fonctionSo.php"); 
	
	$_SESSION['uid'] = "X"; 
	#Essai WriteUserLog 
	#WriteUserLog("ça écrit!!");
	#WriteInterventionLog("ça écrit!","Operation"); 
	
	#Essai CHECKID 
	#try{
	#	print(CheckID("PER001", "md1"));
	#}catch(Exception $e){
	#	echo $e -> getMessage();
	#}

	#Essai Delete Patient
	#DeletePatient("170125410485276");

	#Essai DeleteService
	#DeleteService("blabla");

	#Essai AddService == OK
	#AddService("bla1","intervention");

	#Essai Facturation #ça ne marche pas :
	#FactureIntervention("INT004","LU46M3","111023370509701");

	#Essai Add = ne marche pas 
	#AddIntervention("A","B","C","D"); 

	#Essai de print historique 
	#PrintArchive("service.txt"); 

	#Essai SearchEmail = OK
	#print(SearchEmail("Matin","Elisabeth"));

	#Test printresults = OK
	#$r = query("SELECT num_secu FROM patient"); 
	#printresults($r,"radio"); 

	#Essai de SearchDay 
	#SearchDay("2017-11-15","apres-midi");

	#Essai Emergency 
	#Emergency("num secu","INT004");

	#Essai de CheckID 
	$array_vide = array('name' => "A",
		'surname' => "B", 
		'ssNumber' => 'x', 
		'gender' => 'F', 
		'birthday' => '2000-01-01',
		 'pathology' => 'rhume', 
		 'emergencyNumber' => '6');
	#try{
	#	$r = CheckPatient($array_vide); 
	#}catch(Exception $e){
	#	echo $e -> getMessage();
	#}
	#if ($r == True){
	#	print("ça marche");
	#}else{
#		print("nop");
	#}


	#Essai AddPatient 
	#try{
	#	AddPatient($array_vide);
	#} catch (Exception $e){
	#	echo $e -> getMessage();	
	#}

	#UpdatePatient
	#try{
	#	UpdatePatient("x",$array_vide); 
	#}catch (Exception $e){
	#	echo $e -> getMessage(); 
	#}

	#try SearchFreeTime
	#$array = SearchFreeTime("INT004"); 
	#essai PrintFreeTime
	#PrintFreeTime($array,"10");

	#essai UpdatedUL
	#print(UpdatedUL("111023370509701","4"));
	?> 

	<p> Coucou </p>

</html>