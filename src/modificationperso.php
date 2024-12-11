<?php 

include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
include 'classe/Images.php';

$utilisateurSelect = new Utilisateur($connexion);
$utilisateurs = $utilisateurSelect->selecTUser($_SESSION['user_id']);



if ($utilisateurs) {
     
      $id = $utilisateurs['id_utilisateur'];
      $lastname = $utilisateurs['nom'] ;
      $name = $utilisateurs['prenom'] ;
      $mail = $utilisateurs['email'] ;
      $mdp = $utilisateurs['mot_de_passe'] ;
      $status = $utilisateurs['status'] ;
      $localisation = $utilisateurs['localisation'] ;
      $codep = $utilisateurs['codeP'] ;
      $ville = $utilisateurs['ville'] ;
      $fonction = $utilisateurs['fonction'] ;
  }
?>
<div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  
  <form action="inscription.php" method="post" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Employés</h2>
<div class="flex flex-col">
      <label for="text" class="text-blue-600 text-sm font-semibold mb-1">Nom</label>
      <input type="text" name="text" placeholder="text" value="<?php echo $lastname ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Status Radio Inputs -->
    <div class="flex flex-col space-y-2">
      <label class="text-blue-600 text-sm font-semibold">Statut</label>
      <div class="flex items-center space-x-4">
        <div class="flex items-center">
          <input type="radio" id="1" name="status" <?php if ($status == "bénévoles") {echo "checked";}?> value="bénévoles" class="mr-2">
          <label for="1">Bénévoles</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="2" name="status" value="salariés" class="mr-2" <?php if ($status == "salariés") {echo "checked";}?>>
          <label for="2">Salariés</label>
        </div>
      </div>
    </div>

  

    <!-- Prénom Input -->
    <div class="flex flex-col">
      <label for="prenom" class="text-blue-600 text-sm font-semibold mb-1">Prénom</label>
      <input type="text" id="prenom" name="prenom" placeholder="Votre Prénom" value="<?php echo $name ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Nom Input -->
    <div class="flex flex-col">
      <label for="nom" class="text-blue-600 text-sm font-semibold mb-1">E-Mail</label>
      <input type="text" id="nom" name="nom" placeholder="Votre Nom" value="<?php echo $mail ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Adresse Input -->
    <div class="flex flex-col">
      <label for="adresse" class="text-blue-600 text-sm font-semibold mb-1">Status</label>
      <input type="text" id="adresse" name="adresse" placeholder="Votre adresse" value="<?php echo $status ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="code_postal" class="text-blue-600 text-sm font-semibold mb-1">Localisation</label>
      <input type="text" id="code_postal" name="code_postal" placeholder="Votre code postal" value="<?php echo $localisation ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="ville" class="text-blue-600 text-sm font-semibold mb-1">Ville</label>
      <input type="text" id="ville" name="ville" placeholder="Votre ville"  value="<?php echo $ville ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="ville" class="text-blue-600 text-sm font-semibold mb-1">Fonction</label>
      <input type="text" id="ville" name="ville" placeholder="Votre ville"  value="<?php echo $fonction ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <button type="submit" class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Enregistrer
    </button>
  </form>

