<?php
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Session.php';
include 'classe/Intervenant.php';


$formation = new Formations($connexion);
$maFormation = false;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $id = $_GET["id"];
  $maFormation = $formation->recupFormationPrecise($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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



<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
  <div class="container mx-auto px-4">
    <div class="flex justify-between max-w-2xl mx-auto mb-4">
      <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
        &larr; Retour à l'accueil
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Partie gauche : Détails de la formation -->
      <div class="bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg p-8">
        <form action="modification.php" method="post" enctype="multipart/form-data" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
          <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Modifier la Formation</h2>

          <input type="hidden" id="id" name="id" value="<?php echo $id;?>" />


          <div class="flex flex-col">
            <label for="Titre" class="text-blue-600 text-sm font-semibold mb-1">Titre</label>
            <input type="text" id="Titre" name="Titre" value="<?php echo $titre ?>"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
          </div>

          <div class="flex flex-col">
            <label for="Description" class="text-blue-600 text-sm font-semibold mb-1">Description</label>
            <textarea id="Description" name="Description" rows="4"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"><?php echo $titre ?></textarea>
          </div>

          <div class="flex flex-col">
            <label for="domaine" class="text-blue-600 text-sm font-semibold mb-1">Domaine</label>
            <select class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" name="domaine">
              <option value="1" <?php if ($domaine == 1) {
                                  echo "selected";
                                } ?>>Gestion</option>
              <option value="2" <?php if ($domaine == 2) {
                                  echo "selected";
                                } ?>>Informatique</option>
              <option value="3" <?php if ($domaine == 3) {
                                  echo "selected";
                                } ?>>Développement durable</option>
              <option value="4" <?php if ($domaine == 4) {
                                  echo "selected";
                                } ?>>Secourisme</option>
              <option value="5" <?php if ($domaine == 5) {
                                  echo "selected";
                                } ?>>Communication</option>
            </select>
          </div>

          <div class="flex flex-col">
            <label for="cout" class="text-blue-600 text-sm font-semibold mb-1">Coût de la formation</label>
            <input type="number" id="cout" name="cout" min="0" step="0.01" value="<?php echo $cout ?>"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
          </div>

          <div class="flex flex-col">
            <label for="placeMax" class="text-blue-600 text-sm font-semibold mb-1">Nombre de places maximum</label>
            <input type="number" id="placeMax" name="placeMax" min="1" value="<?php echo $placeMax ?>"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
          </div>


          <div class="flex flex-col">
            <label for="public_concerne" class="text-blue-600 text-sm font-semibold mb-1">Public concerné</label>
            <input type="text" id="public_concerne" name="public_concerne" value="<?php echo $public ?>"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
          </div>

          <div class="flex flex-col">
            <label for="lieux" class="text-blue-600 text-sm font-semibold mb-1">Lieu</label>
            <input type="text" id="lieux" name="lieux" value="<?php echo $lieux ?>"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
          </div>

          <div class="flex flex-col">
            <label for="objectifs" class="text-blue-600 text-sm font-semibold mb-1">Objectifs</label>
            <textarea id="objectifs" name="objectifs" rows="3" value="<?php echo $objectifs ?>"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"><?php echo $objectifs ?></textarea>
          </div>

          <div class="flex flex-col">
            <label for="contenu" class="text-blue-600 text-sm font-semibold mb-1">Contenu</label>
            <textarea id="contenu" name="contenu" rows="3"
              class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"><?php echo $contenu ?></textarea>
          </div>


          <button type="submit"
            class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
            Enregistrer
          </button>
        </form>
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
                <p> <a href="modifierSessions.php?id_sessionsw²=<?php echo $id_sessions; ?>" class="text-red-600	">Modifier session</a>
                </p>

              </li>


            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p class="text-gray-500 text-center">Aucune session créée pour le moment.</p>
        <?php endif; ?>
      </div>
    </div>

    <div class="mt-8 flex justify-center gap-4">
      <button class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
        Inscription
      </button>
      <?php if ($_SESSION['status'] == "bénévoles"): ?>
        <a href="modification.php?id=<?php echo $id; ?>" class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
          Modification
        </a>
        <a href="index.php?id=<?php echo $id; ?>" onclick="return confirmDeletion();" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
          Supprimer
        </a>
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