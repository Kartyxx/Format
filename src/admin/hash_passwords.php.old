<?php
include '../include/connexionbdd.php';
session_start();

$resSQL = "Select id_utilisateur, mot_de_passe from utilisateur";
$stmt = $connexion->prepare($resSQL);
$stmt->execute();
$utilisateurs = $stmt->fetchAll();

foreach ($utilisateurs as $utilisateur) {


    $reqSQL1 = ("UPDATE utilisateur SET mot_de_passe = :mdp Where id_utilisateur = :id");
    $stmt = $connexion->prepare($reqSQL1);

    $id= $utilisateur['id_utilisateur'];
    $mdp= $utilisateur['mot_de_passe'];

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':mdp', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
    

    $stmt->execute();
    
}
?>