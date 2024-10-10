<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Utilisateur.php';
session_start();

$response ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){



    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $utilisateur = new Utilisateur($connexion);
    $response= $utilisateur->seConnecter($email, $mdp);
    echo $response;
}


if ($response!=null) {
    header("Location: index.php");
    exit();}


else{

    echo "connexion impossible";
}



?>

<form action="connexion.php" method="post" class="">
    <input type="email" name="email" placeholder="Votre id" class="" required>
    <input type="password" name="mdp" placeholder="Entrez un mdp" class="" required>
    <button id="" type="submit" class="">Se connecter</button>
</form>




    <a href="inscription.php" class="">Inscription</a>


    <?php 
include 'include/footer.php';

?>