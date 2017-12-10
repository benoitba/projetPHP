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
- Modification du formulaire patient (ajout de maxlength pour le num�ro social, de max pour le NU, d'un menu d�roulant pour le sexe et la pathologie) 
- Ecriture de la fonction ReturnPathology : qui retourne les pathologies 

Remarque : dans resultsIntervention.php : il faut "traduire" le cr�neau de l'intervention en jour/date
Remarque : pour recherche intervention le num�ro de s�cu n'est pas pris en compte 

Modifications du 9/12/2017 :
- searchMail renomm� en searchUser et resultsSearchMail renomm� en resultsUser, car il sert aussi � trouver l'historique de l'utilisateur en question
- lignes pour l'acc�s � la recherche de mail boug� de fonctionsBen.PrintHeader � la page index.php
- squelette du site termin�
- fusion des 2 fichiers de fonctions
- TODO : 
	-fonctions SearchInterventionNF qui retoure les intervetions non factur�es (ou trouver une autre solution)
	- comment ajouter et supprimer facilement les services d'intervention/accueil
	- configurer la recherche de mail ou historique avec ID d'utilisateur
- premier tests sur cas classique :
	- NU ne marche pas quand on ajoute un patient

Modifications du 10/12/2017:
- correction de recherche adresse mail qui ne marchait plus 
- correction le NU marche quand on ajoute un patient ! 
- traduction du cr�neau en jour/date par la fonction ReturnIntervention() 
- changement dans printResult() while au lieu d'un foreach ; changement dans DeleteIntervention (on prend en entr�e une chaine "ID_service ID_inter") 

Tests = 
- rechercher patient : rien ne marche 
- cr�er intervention ne marche pas non plus 
- delete intervention = le post ne se remplit pas?? 
