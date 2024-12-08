<?php
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';

$formation = new Formations($connexion);
$maFormation = false;
if ($_SERVER['REQUEST_METHOD'] == 'GET'){

$id = $_GET["id"];
$maFormation = $formation->recupFormationPrecise($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id = $_POST['id'];
  $titre = $_POST['Titre'];
  $description = $_POST['Description'];
  $domaine = $_POST['domaine'];
  $cout = $_POST['cout'];
  $placeMax = $_POST['placeMax'];
  $public = $_POST['public_concerne'];
  $lieux = $_POST['lieux'];
  $objectifs = $_POST['objectifs'];
  $contenu = $_POST['contenu'];

  $formation->modifierFormation($id, $titre, $description, $domaine, $cout, $placeMax, $lieux, $public, $objectifs, $contenu,);


}


if ($maFormation != False) {

  $titre = $maFormation['titre'];
  $description = $maFormation['description'];
  $domaine = $maFormation['id_domaine'];
  $cout = $maFormation['cout'];
  $placeMax = $maFormation['nombre_max_participants'];
  $public = $maFormation['public_concerne'];
  $lieux = $maFormation['lieu'];
  $objectifs = $maFormation['objectifs'];
  $contenu = $maFormation['contenu'];


}
?>




<div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">

  <div class="flex justify-between max-w-2xl mx-auto mb-4">

    <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
      &larr; Retour à l'accueil
    </a>



  </div>


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
      </tbody>
    </table>
  </div>

  <!-- Boutons -->
  <div class="mt-8 flex justify-center gap-4">

  <button class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
        Inscription
      </button>
    <?php if ($_SESSION['status'] == "bénévoles") { ?>
      <a href="modification.php?id=<?php echo $id; ?>" class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
        Modification
      </a>
      <a href="index.php?id=<?php echo $id; ?>" onclick="return confirmDeletion();" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
        Supprimer
      </a>
    <?php } ?>
  </div>
</div>





<?php
include 'include/footer.php';
?>

<script>
function confirmDeletion() {
    return confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
}
</script>