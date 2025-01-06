<?php 
include 'src/include/header.php';
include 'src/include/connexionbdd.php';
include 'src/classe/Utilisateur.php';

$response ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){



    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $utilisateur = new Utilisateur($connexion);
    $response= $utilisateur->seConnecter($email, $mdp);
    echo $response;
}


if ($response!=null) {
    header("Location: src/index.php");
    exit();}


else{

  
  echo  "connexion impossible";
  
}



?>


<div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  <form action="connexion.php" method="post" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Se connecter</h2>

    <!-- Input Email -->
    <div class="flex flex-col">
      <label for="email" class="text-blue-600 text-sm font-semibold mb-1">Votre Email</label>
      <input type="email" name="email" placeholder="Votre Email" required
        class="px-4 py-3 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Input Password -->
    <div class="flex flex-col">
      <label for="mdp" class="text-blue-600 text-sm font-semibold mb-1">Mot de passe</label>
      <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required
        class="px-4 py-3 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Submit Button -->
    <button type="submit" class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Se connecter
    </button>

    <!-- Inscription Link -->
    <div class="text-center">
      <a href="inscription.php" class="block text-sm text-blue-600 hover:text-blue-700 mt-4">
        Inscription
      </a>
    </div>
  </form>
</div>





    <?php 
include 'src/include/footer.php';

?>