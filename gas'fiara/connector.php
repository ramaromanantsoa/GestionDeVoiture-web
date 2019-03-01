<?php

/*
	Configurer la connexion de votre BD ici
*/

//Debut valeur à remplacer
$host = "localhost";
$dbname = "";
$dbuser = "";
$dbpass = "";
//Fin valeur à remplacer

try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$connect = new PDO($dsn,$dbuser,$dbpass);
	//echo "Connexion MySQL établit";
} 

//s'il y a des problèmes avec la connexion, ce message s'affiche
catch ( Exception $msg ) {
	echo "Echec de connection MySQL pour cause : " . $msg->getMessage();
}

?>