<?php
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Session.php';
include 'classe/Intervenant.php';


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

$intervenantClass = new Intervenant($connexion);
$session = new Session($connexion);
$sessions = $session->getSession($id);


$nom_domaine = $formation->getdomaine($domaine);


?>










    
    
    <!-- Liste des sessions -->
    <div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
  <div class="container mx-auto px-4">
    <!-- Bouton de retour -->
    <div class="flex justify-between max-w-2xl mx-auto mb-4">
      <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
        &larr; Retour à l'accueil
      </a>
    </div>

    <!-- Liste des sessions -->
    <div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
      <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Sessions Créées</h2>
      <?php if (!empty($sessions)): ?>
        <ul class="space-y-4">
          <?php foreach ($sessions as $sess): ?>
            <?php
              $id_sessions = $sess['id_sessions'];
              $intervenantNameTable = $intervenantClass->getIntervenantsNom($id_sessions);
            ?>
            <li class="text-center bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg p-8">
              <p class="text-lg font-semibold text-gray-800">
                <strong>Intervenant :</strong>
                <?php foreach ($intervenantNameTable as $intervenantName): 
                  $intervenantN = $intervenantName['nom']; ?>
                  <span class="text-blue-700"> <?php echo htmlspecialchars($intervenantN) . '.'; ?></span>
                <?php endforeach; ?>
              </p>
              <p class="text-md text-gray-700 mt-2">
                <strong>Dates :</strong> <?php echo $sess['datesD']; ?> &rarr; <?php echo $sess['datesF']; ?></p>
              <p class="text-md text-gray-700 mt-2">
                <strong>Date limite :</strong> <?php echo $sess['date_limite_inscription']; ?></p>
              <div class="mt-8 flex justify-center gap-4">
                <a href="inscrire.php?id=<?php echo $id_sessions; ?>" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
                  Inscription
                </a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-gray-500 text-center">Aucune session créée pour le moment.</p>
      <?php endif; ?>
    </div>
  </div>
</div>











<?php
include 'include/footer.php';
?>

<script>
function confirmInscription() {
    return confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
}
</script>