<?php

// Ne pas changer
// Do not change
$db_host = "localhost";
$db_name = "performance_schema";


// Mettre votre nom d'utilisateur de votre base de donnée (par défaut : root)
// Put your database username (by default : root)
$db_username = "root";


// Mettre le mot de passe de votre base de données (par défaut : laisser vide)
// Put your database password (by default: empty)
$db_password = "";

try {
	$bdd = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
	$server_name = 'Mysql version : '.$bdd->getAttribute(PDO::ATTR_SERVER_VERSION) . ' (port : 3306)';
}
catch (Exception $e) {
	$server_name = isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "Not available due to misconfiguration of «db.php» file from «inc» folder." : "Non disponible en raison d'une mauvaise configuration du fichier «db.php» depuis le dossier «inc».";
}