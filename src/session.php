<?php
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
include 'classe/Images.php';
include 'classe/Intervenant.php';
include 'classe/Session.php';





/*if ($_SESSION['status']!="bénévoles"){
    header("Location: index.php");
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['start'])) {

    if (!empty($_POST['intervenants'])) {
      $intervenants = $_POST['intervenants'];
    }
    $id = $_POST['id'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $limit = $_POST['limit'];
    $lieux = $_POST['lieux'];
    $intervenantClass = new Intervenant($connexion);
    $session = new Session($connexion);
    $sessionId = $session->addSession($id, $start, $end, $limit, $lieux);

    $formations = new Formations($connexion);
    $domaineId = $formations->recupDomaineFormation($id);
    $domaine = $domaineId['id_domaine'];

    foreach ($intervenants as $intervenantId) {

      $intervenantClass->intervention($intervenantId, $sessionId);


      $sessions = $session->getSession($id);
    }
  }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['Titre'])) {
    $titre = $_POST['Titre'];
    $description = $_POST['Description'];
    $domaine = $_POST['domaine'];
    $cout = $_POST['cout'];
    $placeMax = $_POST['placeMax'];
    $public = $_POST['public_concerne'];
    $lieux = $_POST['lieux'];
    $objectifs = $_POST['objectifs'];
    $contenu = $_POST['contenu'];



    if (isset($_FILES['imageFormation'])) {
      $fileName = $_FILES['imageFormation']['name'];
      move_uploaded_file($_FILES['imageFormation']['tmp_name'], __DIR__ . '/images/' . $_FILES['imageFormation']['name']);

      $images = new Images($connexion);
      $idImage = $images->insererPhoto($fileName);
    }

    $formations = new Formations($connexion);
    $id = $formations->creerFormation($titre, $description, $domaine, $cout, $placeMax, $lieux, $public, $objectifs, $contenu, $idImage);
  }
}


?>



<?php
$intervenantClass = new Intervenant($connexion);
$intervenants = $intervenantClass->getIntervenants($domaine);
?>

<div class="container mx-auto px-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Formulaire de création de session -->
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg p-8">
      <div class="flex justify-start mb-4">
        <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
          &larr; Retour à l'accueil
        </a>
      </div>
      <form action="session.php" id="formulaire" method="post" enctype="multipart/form-data" class="space-y-6">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Créer une Session</h2>

        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />

        <!-- Champ pour la date de début -->
        <div>
          <label for="start" class="block text-sm font-medium text-gray-700">Date début</label>
          <input type="date" id="start" name="start" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Champ pour la date de fin -->
        <div>
          <label for="end" class="block text-sm font-medium text-gray-700">Date fin</label>
          <input type="date" id="end" name="end" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Champ pour la date limite -->
        <div>
          <label for="limit" class="block text-sm font-medium text-gray-700">Date limite</label>
          <input type="date" id="limit" name="limit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
          <label for="lieux" class="block text-sm font-medium text-gray-700">Lieux</label>
          <input type="text" id="lieux" name="lieux" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div id="select-container">
          <select name="intervenants[]" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <?php foreach ($intervenants as $intervenant): ?>
              <option value="<?php echo $intervenant['id_intervenants']; ?>">
                <?php echo htmlspecialchars($intervenant['nom']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <button type="button" onclick="ajouterSelectBox()">Ajouter un intervenant</button>
        <!-- Bouton de soumission -->
        <div class="text-right">
          <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Soumettre
          </button>



        </div>
      </form>
    </div>

    <!-- Liste des sessions -->
    <div class="bg-white shadow-xl rounded-lg p-8">
      <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Sessions Créées</h2>

      <?php
      if (!empty($sessions)): ?>
        <ul class="space-y-4">
          <?php foreach ($sessions as $sess): ?>


            <?php
            $id_sessions = $sess['id_sessions'];
            $intervenantNameTable = $intervenantClass->getIntervenantsNom($id_sessions);



            ?>
            <li class="p-4 bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 rounded-lg shadow">


              <p><strong>Intervenant :</strong> <?php foreach ($intervenantNameTable as $intervenantName): 
                $intervenantN = $intervenantName['nom']; ?>
                <?php echo htmlspecialchars($intervenantN)." ."; ?>
                <?php endforeach; ?> 
              </p>




              <p><strong>Dates :</strong> <?php echo $sess['datesD']; ?> &rarr; <?php echo $sess['datesF']; ?></p>
              <p><strong>Date limite :</strong> <?php echo $sess['date_limite_inscription']; ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-gray-500 text-center">Aucune session créée pour le moment.</p>
      <?php endif; ?>



      
    </div>
  </div>
</div>

</html>


</form>

<?php if (!empty($sessions)){ ?>

<a href="index.php">
<button class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 focus:outline-none">
  Terminer
</button>
</a>



<?php }; ?>


<div id="intervenant-template" style="display: none;">
  <?php foreach ($intervenants as $intervenant): ?>
    <option value="<?php echo $intervenant['id_intervenants']; ?>">
      <?php echo htmlspecialchars($intervenant['nom']); ?>
    </option>
  <?php endforeach; ?>
</div>




<script>
  function ajouterSelectBox() {
    const container = document.getElementById('select-container');
    const template = document.getElementById('intervenant-template').innerHTML;

    const selectBox = document.createElement('select');
    selectBox.name = 'intervenants[]';
    selectBox.classList = 'mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm';
    selectBox.innerHTML = template;

    container.appendChild(selectBox);
  }
</script>



<?php
include 'include/footer.php'; ?>