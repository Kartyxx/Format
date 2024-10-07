<?php
	$hote= "localhost";
	$login= "root"; 
	$mdp = ""; 
	$nombd="format";
	
	try { 
		$connexion = new PDO("mysql:host=$hote;dbname=$nombd", $login, $mdp); 
	} 
	catch ( Exception $e ) {
		echo "Erreur de connexion : " . $e->getMessage();
	}
?>