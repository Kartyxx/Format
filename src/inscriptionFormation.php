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




<div class="container mx-auto px-4">
  <div class="flex justify-between max-w-2xl mx-auto mb-4">
    <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
      &larr; Retour à l'accueil
    </a>
  </div>



    <!-- Partie droite : Liste des sessions -->
    <div class="bg-white shadow-xl rounded-lg p-8">
      <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Sessions Créées</h2>
      <?php if (!empty($sessions)): ?>
        <ul class="space-y-4">
          <?php foreach ($sessions as $sess): ?>
            <?php
              $id_sessions = $sess['id_sessions'];
              $intervenantNameTable = $intervenantClass->getIntervenantsNom($id_sessions);
            ?>
            <li class="p-4 bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 rounded-lg shadow">
              <p><strong>Intervenant :</strong> 
                <?php foreach ($intervenantNameTable as $intervenantName): 
                  $intervenantN = $intervenantName['nom']; ?>
                  <?php echo htmlspecialchars($intervenantN) . "."; ?>
                <?php endforeach; ?> 
              </p>
              <p><strong>Dates :</strong> <?php echo $sess['datesD']; ?> &rarr; <?php echo $sess['datesF']; ?></p>
              <p><strong>Date limite :</strong> <?php echo $sess['date_limite_inscription']; ?></p>
              <a href="inscrire.php?id=<?php echo $id_sessions; ?>" class="text-green">
      Inscription
      </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-gray-500 text-center">Aucune session créée pour le moment.</p>
      <?php endif; ?>
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