<?PHP 
	session_start();
	
	/*
	* Paramètres d'activation du mode sombre automatique
	*
	* $_SESSION['startDarkMode'] pour l'heure de début
	* $_SESSION['endDarkMode'] pour l'heure de fin
	* L'activation du mode sombre manuellement désactive l'activation automatique jusqu'à ce que le navigateur perd ou ferme la session 
	*/
	
		/*
	 * Auto dark mode activation settings
 	 *
 	 * $_SESSION['startDarkMode'] for start time (default 18h or 6PM)
 	 * $_SESSION['endDarkMode'] for end time default (08h or 08AM)
  	 * Enabling dark mode manually disables automatic activation until browser loses or logs off
 	 */
 	 
	$_SESSION['startDarkMode'] = 18;
	$_SESSION['endDarkMode'] = 8;
		
	/*
	* Veuillez entrer votre version de Ksweb. Malheureusement nous ne pouvons pas obtenir cette version de l'application si vous laissez cette variable vide, nous afficherons le numéro de la dernière version de l'application
	*/
	
	/*
 	* Please enter your version of Ksweb.  Unfortunately we cannot get this version of the application if you leave this variable empty, we will display the number of the latest version of the application
 	*/
	
	$_SESSION['ksweb_version'] = ""; 
?>