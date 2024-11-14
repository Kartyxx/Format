<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Utilisateur.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $status = $_POST['status'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $fonction = $_POST['fonction'];
    $eNomEntreprise = $_POST['NomEntreprise'];
    $emailEntreprise = $_POST['emailEntreprise'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $nomPrenomPdg = $_POST['nomPrenomPdg'];
    $NumIcom = $_POST['NumIcom'];
    $idEntrerise = $_POST['idEntrerise'];

    // var_dump($_POST);


    $utilisateur = new Utilisateur($connexion);
    $utilisateur->sInscrire($prenom, $nom, $status, $email, $mdp, $adresse, $code_postal, $ville, $fonction, $idEntrerise);
    
}
?>


<div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  <!-- Bouton de retour -->
  <div class="flex justify-start max-w-md mx-auto mb-4">
    <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
      &larr; Retour à l'accueil
    </a>
  </div>

  <form action="inscription.php" method="post" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Employés</h2>

    <div class="flex flex-col">
      <label for="email" class="text-blue-600 text-sm font-semibold mb-1">Email</label>
      <input type="email" name="email" placeholder="Email" required class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="mdp" class="text-blue-600 text-sm font-semibold mb-1">Mot de passe</label>
      <input type="password" name="mdp" placeholder="Entrez un mot de passe" required class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <span class="text-blue-600 text-sm font-semibold mb-1">Statut</span>
      <div class="flex space-x-4">
        <label class="flex items-center text-blue-600">
          <input type="radio" id="1" name="status" value="bénévoles" class="mr-2"> Bénévoles
        </label>
        <label class="flex items-center text-blue-600">
          <input type="radio" id="2" name="status" value="salariés" class="mr-2"> Salariés
        </label>
      </div>
    </div>

    <div class="flex flex-col">
      <label for="fonction" class="text-blue-600 text-sm font-semibold mb-1">Fonction</label>
      <input type="text" id="fonction" name="fonction" placeholder="Votre fonction" required class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Les champs supplémentaires pour le formulaire d'inscription -->

    <div class="flex flex-col">
      <label for="prenom" class="text-blue-600 text-sm font-semibold mb-1">Prénom</label>
      <input type="text" id="prenom" name="prenom" placeholder="Votre Prénom" required class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="nom" class="text-blue-600 text-sm font-semibold mb-1">Nom</label>
      <input type="text" id="nom" name="nom" placeholder="Votre Nom" required class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Répéter ce même style pour chaque champ d'entrée restant -->

    <button type="submit" class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Soumettre
    </button>

    <a href="connexion.php" class="mt-4 block text-center text-blue-600 hover:underline">Connexion</a>
  </form>
</div>
