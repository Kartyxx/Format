<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
session_start();

$id=$_POST['id'];
$mdp=$_POST['mdp'];


$utilisateur = new Utilisateur($connexion);
$response= $utilisateur->seConnecter($id, $mdp);

if ($response!=null) {
    header("Location: index.php");
    exit();}
else{

    echo "conenxion impossible";
}



?>

<form action="connexion.php" method="post" class="">
        <input type="texte" name="id" placeholder="Votre id" class="" required>
        <input type="password" name="mdp" placeholder="Entrez un pseudo" class="" required>
        <button id="" type="submit" class="">Se connecter</button>
    </form>




    <a href="inscription.php" class="text-white">Inscription</a>


    <?php 
include 'include/footer.php';
?>