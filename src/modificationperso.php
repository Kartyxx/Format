<?php 

include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
include 'classe/Images.php';

$utilisateurSelect = new Utilisateur($connexion);
$utilisateurs = $utilisateurSelect->selecTUser($_SESSION['user_id']);


if ($utilisateurs) {
    // Initialisation des variables avec les données récupérées
    $id = $utilisateurs['id_utilisateur'];
    $lastname = $utilisateurs['nom'];
    $name = $utilisateurs['prenom'];
    $mail = $utilisateurs['email'];
    $status = $utilisateurs['status'];
    $localisation = $utilisateurs['localisation'];
    $codep = $utilisateurs['codeP'];
    $ville = $utilisateurs['ville'];
    $fonction = $utilisateurs['fonction'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $status = $_POST['status'];
    $lastname = $_POST['nom'];
    $name = $_POST['prenom'];
    $mail = $_POST['email'];
    $localisation = $_POST['adresse'];
    $codep = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $fonction = $_POST['fonction'];

    // Mise à jour dans la base de données
    $updateUtilisateur = new Utilisateur($connexion);
    $updateUtilisateur->updateUtilisateur(
        $_SESSION['user_id'], 
        $lastname, 
        $name, 
        $mail, 
        $localisation, 
        $codep, 
        $ville, 
        $fonction, 
        $status
    );

    echo "<p class='text-green-600 text-center font-bold'>Les données ont été mises à jour avec succès.</p>";
}

?>
<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
  <form action="" method="post" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Modifier les informations de l'utilisateur</h2>

    <!-- Status Radio Inputs -->
    <div class="flex flex-col space-y-2">
      <label class="text-blue-600 text-sm font-semibold">Statut</label>
      <div class="flex items-center space-x-4">
        <div class="flex items-center">
          <input type="radio" id="status_benevoles" name="status" value="bénévoles" class="mr-2" <?php if ($status == "bénévoles") echo "checked"; ?>>
          <label for="status_benevoles">Bénévoles</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="status_salaries" name="status" value="salariés" class="mr-2" <?php if ($status == "salariés") echo "checked"; ?>>
          <label for="status_salaries">Salariés</label>
        </div>
      </div>
    </div>

    <!-- Nom -->
    <div class="flex flex-col">
      <label for="nom" class="text-blue-600 text-sm font-semibold mb-1">Nom</label>
      <input type="text" id="nom" name="nom" value="<?php echo $lastname; ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Prénom -->
    <div class="flex flex-col">
      <label for="prenom" class="text-blue-600 text-sm font-semibold mb-1">Prénom</label>
      <input type="text" id="prenom" name="prenom" value="<?php echo $name; ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Email -->
    <div class="flex flex-col">
      <label for="email" class="text-blue-600 text-sm font-semibold mb-1">E-mail</label>
      <input type="email" id="email" name="email" value="<?php echo $mail; ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Adresse -->
    <div class="flex flex-col">
      <label for="adresse" class="text-blue-600 text-sm font-semibold mb-1">Adresse</label>
      <input type="text" id="adresse" name="adresse" value="<?php echo $localisation; ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Code postal -->
    <div class="flex flex-col">
      <label for="code_postal" class="text-blue-600 text-sm font-semibold mb-1">Code Postal</label>
      <input type="text" id="code_postal" name="code_postal" value="<?php echo $codep; ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Ville -->
    <div class="flex flex-col">
      <label for="ville" class="text-blue-600 text-sm font-semibold mb-1">Ville</label>
      <input type="text" id="ville" name="ville" value="<?php echo $ville; ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <!-- Fonction -->
    <div class="flex flex-col">
      <label for="fonction" class="text-blue-600 text-sm font-semibold mb-1">Fonction</label>
      <input type="text" id="fonction" name="fonction" value="<?php echo $fonction; ?>" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <button type="submit" class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Enregistrer
    </button>
  </form>
</div>
