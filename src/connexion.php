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
<form action="connexion.php" method="post" class="space-y-4 font-[sans-serif] max-w-md mx-auto">
    <input type="email" name="email" placeholder="Votre id" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" required>
    <input type="password" name="mdp" placeholder="Entrez un mdp" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-transparent focus:border-blue-500 rounded" required>
    <button id="" type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Se connecter</button>
</form>
</div>



    <a href="inscription.php" class="">Inscription</a>


    <?php 
include 'include/footer.php';

?>