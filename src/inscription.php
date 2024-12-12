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

     var_dump($_POST);

    $utilisateur = new Utilisateur($connexion);
    $utilisateur->sInscrire($prenom, $nom, $status, $email, $mdp, $adresse, $code_postal, $ville, $fonction, $idEntrerise);

    

    
}
?>


<div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  
  <form action="inscription.php" method="post" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Employés</h2>

    <!-- Email Input -->
    <div class="flex flex-col">
      <label for="email" class="text-blue-600 text-sm font-semibold mb-1">Email</label>
      <input type="email" name="email" placeholder="Email" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Password Input -->
    <div class="flex flex-col">
      <label for="mdp" class="text-blue-600 text-sm font-semibold mb-1">Mot de passe</label>
      <input type="password" name="mdp" placeholder="Entrez un mot de passe" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Status Radio Inputs -->
    <div class="flex flex-col space-y-2">
      <label class="text-blue-600 text-sm font-semibold">Statut</label>
      <div class="flex items-center space-x-4">
        <div class="flex items-center">
          <input type="radio" id="1" name="status" value="bénévoles" class="mr-2">
          <label for="1">Bénévoles</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="2" name="status" value="salariés" class="mr-2">
          <label for="2">Salariés</label>
        </div>
      </div>
    </div>

    <!-- Fonction Input -->
    <div class="flex flex-col">
      <label for="fonction" class="text-blue-600 text-sm font-semibold mb-1">Fonction</label>
      <input type="text" id="fonction" name="fonction" class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" placeholder="Votre fonction" required />
    </div>

    <!-- Prénom Input -->
    <div class="flex flex-col">
      <label for="prenom" class="text-blue-600 text-sm font-semibold mb-1">Prénom</label>
      <input type="text" id="prenom" name="prenom" placeholder="Votre Prénom" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Nom Input -->
    <div class="flex flex-col">
      <label for="nom" class="text-blue-600 text-sm font-semibold mb-1">Nom</label>
      <input type="text" id="nom" name="nom" placeholder="Votre Nom" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Adresse Input -->
    <div class="flex flex-col">
      <label for="adresse" class="text-blue-600 text-sm font-semibold mb-1">Adresse</label>
      <input type="text" id="adresse" name="adresse" placeholder="Votre adresse" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Code Postal Input -->
    <div class="flex flex-col">
      <label for="code_postal" class="text-blue-600 text-sm font-semibold mb-1">Code Postal</label>
      <input type="text" id="code_postal" name="code_postal" placeholder="Votre code postal" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Ville Input -->
    <div class="flex flex-col">
      <label for="ville" class="text-blue-600 text-sm font-semibold mb-1">Ville</label>
      <input type="text" id="ville" name="ville" placeholder="Votre ville" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Id Entreprise Input -->
    <div class="flex flex-col">
      <label for="idEntrerise" class="text-blue-600 text-sm font-semibold mb-1">Id entreprise</label>
      <input type="text" id="idEntrerise" name="idEntrerise" placeholder="Id de votre entreprise" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Entreprise Section -->
    <h2 class="text-xl font-bold text-blue-700 mt-6 mb-4">Entreprise</h2>

    <!-- Nom Entreprise Input -->
    <div class="flex flex-col">
      <label for="NomEntreprise" class="text-blue-600 text-sm font-semibold mb-1">Nom Entreprise</label>
      <input type="text" id="NomEntreprise" name="NomEntreprise" placeholder="Nom Entreprise"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Email Entreprise Input -->
    <div class="flex flex-col">
      <label for="emailEntreprise" class="text-blue-600 text-sm font-semibold mb-1">Email de l'entreprise</label>
      <input type="email" name="emailEntreprise" placeholder="Email de l'entreprise"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Téléphone Input -->
    <div class="flex flex-col">
      <label for="tel" class="text-blue-600 text-sm font-semibold mb-1">Téléphone</label>
      <input type="text" id="tel" name="tel" placeholder="Téléphone"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Fax Input -->
    <div class="flex flex-col">
      <label for="fax" class="text-blue-600 text-sm font-semibold mb-1">Fax</label>
      <input type="text" id="fax" name="fax" placeholder="Fax de l'entreprise"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Nom et Prénom PDG Input -->
    <div class="flex flex-col">
      <label for="nomPrenomPdg" class="text-blue-600 text-sm font-semibold mb-1">Nom et Prénom du PDG</label>
      <input type="text" id="nomPrenomPdg" name="nomPrenomPdg" placeholder="Nom et Prénom du PDG"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Numéro Icom Input -->
    <div class="flex flex-col">
      <label for="NumIcom" class="text-blue-600 text-sm font-semibold mb-1">Numéro Icom</label>
      <input type="text" id="NumIcom" name="NumIcom" placeholder="Numéro Icom"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <button type="submit" class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Soumettre
    </button>
  </form>

  <div class="text-center mt-4">
    <a href="connexion.php" class="text-blue-600 hover:text-blue-700">Connexion</a>
  </div>

</div>