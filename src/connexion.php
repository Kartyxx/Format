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



<div class="min-h-screen flex items-center justify-center bg-gray-900">
  <form action="connexion.php" method="post" class="bg-gray-700 p-8 rounded-lg shadow-lg text-orange-50 space-y-4 max-w-md w-full">
    <input type="email" name="email" placeholder="Votre id" class="px-4 py-3 bg-slate-950 w-full text-sm outline-none border-b-2 border-amber-500 rounded" required>
    <input type="password" name="mdp" placeholder="Entrez un mdp" class="px-4 py-3 bg-slate-950 w-full text-sm outline-none border-b-2 border-amber-500 rounded" required>
    <button id="" type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-amber-500 text-white rounded hover:bg-amber-700">Se connecter</button>
    <a href="inscription.php" class="my-5">Inscription</a>
  </form>
  
</div>






    <?php 
include 'include/footer.php';

?>