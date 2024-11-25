<?php 

include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
include 'classe/Images.php';




if ($_SESSION['status']!="bénévoles"){
    header("Location: index.php");
}

$id = $_GET["id"];
$formation = new Formations($connexion);
$maFormation = $formation->recupFormationPrecise($id);

$images = new Images($connexion);
$imageName = $images->recupererNom($id);

if ($maFormation) {

  $titre = $maFormation['titre'];
  $description = $maFormation['description'];
  $domaine = $maFormation['id_domaine'];
  $cout = $maFormation['cout'];
  $placeMax = $maFormation['nombre_max_participants'];
  $dateDebut = $maFormation['date_debut'];
  $dateFin = $maFormation['date_fin'];
  $public = $maFormation['public_concerne'];
  $lieux = $maFormation['lieu'];
  $objectifs = $maFormation['objectifs'];
  $contenu = $maFormation['contenu'];
  $datelimite = $maFormation['date_limite_inscription'];
}
?>

    <div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  
  <!-- Bouton de retour -->
  <div class="flex justify-start max-w-md mx-auto mb-4">
    <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
      &larr; Retour à l'accueil
    </a>
  </div>
  
  <form action="formation.php" method="post" enctype="multipart/form-data" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Créer une Formation</h2>

    <div class="flex flex-col">
      <label for="Titre" class="text-blue-600 text-sm font-semibold mb-1">Titre</label>
      <input type="text" id="Titre" name="Titre" value="<?php echo $titre?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="Description" class="text-blue-600 text-sm font-semibold mb-1">Description</label>
      <textarea id="Description" name="Description" rows="4" 
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"><?php echo $description?></textarea>
    </div>

    <input type="hidden" name="id" value="<?php echo $id ?>" />

    <div class="flex flex-col">
  <label for="domaine" class="text-blue-600 text-sm font-semibold mb-1">Domaine</label>
  <select class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" name="domaine">
    <option value="1" <?php echo $domaine == 1 ? 'selected' : ''; ?>>Gestion</option>
    <option value="2" <?php echo $domaine == 2 ? 'selected' : ''; ?>>Informatique</option>
    <option value="3" <?php echo $domaine == 3 ? 'selected' : ''; ?>>Développement durable</option>
    <option value="4" <?php echo $domaine == 4 ? 'selected' : ''; ?>>Secourisme</option>
    <option value="5" <?php echo $domaine == 5 ? 'selected' : ''; ?>>Communication</option>
  </select>
</div>

    <div class="flex flex-col">
      <label for="cout" class="text-blue-600 text-sm font-semibold mb-1">Coût de la formation</label>
      <input type="number" id="cout" name="cout" min="0" step="0.01" value="<?php echo $cout?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="placeMax" class="text-blue-600 text-sm font-semibold mb-1">Nombre de places maximum</label>
      <input type="number" id="placeMax" name="placeMax" min="1" value="<?php echo $placeMax?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="DateDebut" class="text-blue-600 text-sm font-semibold mb-1">Date de début</label>
      <input type="date" id="DateDebut" name="DateDebut" value="<?php echo $dateDebut?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="DateFin" class="text-blue-600 text-sm font-semibold mb-1">Date de fin</label>
      <input type="date" id="DateFin" name="DateFin" value="<?php echo $dateFin?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="public_concerne" class="text-blue-600 text-sm font-semibold mb-1">Public concerné</label>
      <input type="text" id="public_concerne" name="public_concerne" value="<?php echo $public?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="lieux" class="text-blue-600 text-sm font-semibold mb-1">Lieu</label>
      <input type="text" id="lieux" name="lieux" value="<?php echo $lieux?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="objectifs" class="text-blue-600 text-sm font-semibold mb-1">Objectifs</label>
      <textarea id="objectifs" name="objectifs" rows="3" value="<?php echo $objectifs?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"><?php echo $objectifs?></textarea>
    </div>

    <div class="flex flex-col">
      <label for="contenu" class="text-blue-600 text-sm font-semibold mb-1">Contenu</label>
      <textarea id="contenu" name="contenu" rows="3" 
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"><?php echo $contenu?></textarea>
    </div>

    <div class="flex flex-col">
      <label for="Datelimite" class="text-blue-600 text-sm font-semibold mb-1">Date limite d'inscription</label>
      <input type="date" id="Datelimite" name="Datelimite" value="<?php echo $datelimite?>"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <button type="submit" 
      class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Enregistrer
    </button>
  </form>
        
</div>