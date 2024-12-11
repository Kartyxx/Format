<?php

include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Session.php';
include 'classe/Intervenant.php';


$user_id = $_SESSION['user_id'];
$id_session = $_GET['id'];
$today = date("Y-m-d H:i:s");
$session = new Session($connexion);

$nbSession = $session->coutSession($user_id);
$nbsess= $nbSession[0]['nb'];

if ($nbsess<3){
    $session->inscriptionSession($user_id, $id_session, $today);
}
else{
    echo "deja 3 sessions inscrit";
}
?>