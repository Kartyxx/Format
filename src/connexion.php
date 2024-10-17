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



<div>
<form action="connexion.php" method="post" class="grid grid-cols-3 gap-4 place-items-center h-56">
    <input type="email" name="email" placeholder="Votre id" class="" required>
    <input type="password" name="mdp" placeholder="Entrez un mdp" class="" required>
    <button id="" type="submit" class="">Se connecter</button>
</form>
</div>



    <a href="inscription.php" class="">Inscription</a>


    <?php 
include 'include/footer.php';

?>