# projetPHP
Projet PHP Polytech

A modifier par rapport au dossier du 8 Novembre :
CheckID : renvoie un array contenant l'ID_personnel et le droit

Modification du 5/12/2017 : 
- modification de login.php : on utilise maintenant CheckID() 
- modification de la fonction CheckID() = on enl�ve l'erreur pour quand mauvais pswd/username
- modification de la fonction CheckID() = on enl�ve le writeUserLog et on le met dans la page login.php
- modification de index.php : changement des droits 'doctor', 'responsible', 'admin' deviennent (1,2,0) comme la BDD
- modification de index.php : correction "intervetion" en "intervention" 

Modification du 7/12/2017 : 
- Cr�er la page searchMail.php : fait un formulaire avec les noms du personnel 
- Cr�er la fonction ReturnName : qui retourne les noms du personnel
- Cr�er la page resultsSearchMail.php : qui print l'adresse mail 
- Ecriture de la fonction SearchInterventionF : qui retourne les interventions factur�es 
- Rajout d'un type "list" dans la fonction printResults 
- Ecriture d'une fonction WhichService : pour savoir de quel service est le responsable connect�

Remarque : dans resultsIntervention.php : il faut "traduire" le cr�neau de l'intervention en jour/date
Remarque : pour recherche intervention le num�ro de s�cu n'est pas pris en compte 
