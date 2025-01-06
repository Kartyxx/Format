<?php
	$hote= "localhost";
	$login= "u552426471_gabin"; 
	$mdp = "Anime2510*"; 
	$nombd="u552426471_test	";
	
	try { 
		$connexion = new PDO("mysql:host=$hote;dbname=$nombd", $login, $mdp); 
	} 
	catch ( Exception $e ) {
		echo "Erreur de connexion : " . $e->getMessage();
	}
?>