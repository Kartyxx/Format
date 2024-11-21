<?php
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';

$id = $_GET["id"];
$formation = new Formations($connexion);
$maFormation = $formation->recupFormationPrecise($id);

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

  <!-- Tableau des informations -->
  <div class="px-8 py-10 max-w-2xl mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Détails de la Formation</h2>
    <table class="table-auto w-full border-collapse border border-blue-200 rounded-lg shadow-sm">
      <tbody>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Titre</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $titre ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Description</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $description ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Domaine</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $domaine ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Prix</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $cout ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Place Max</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $placeMax ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Date Début</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $dateDebut ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Date Fin</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $dateFin ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Public</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $public ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Lieu</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $lieux ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Objectifs</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $objectifs ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Contenu</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $contenu ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Date Limite</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $datelimite ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


<?php
include 'include/footer.php';
?>