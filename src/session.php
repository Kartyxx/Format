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
 
  if (isset($_POST['intervenant'])){

    echo "test";
    print_r($_POST);

    $id = $_POST['id'];
    $intervenant = $_POST['intervenant'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $limit = $_POST['limit'];
    $lieux = $_POST['lieux'];
    $session = new Session($connexion);
    $session->addSession($id, $intervenant, $start, $end, $limit, $lieux);
    $sessions=$session->getSession($id);
    var_dump($sessions);  
  }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  if (isset($_POST['Titre'])){
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
    echo $fileName;
    move_uploaded_file($_FILES['imageFormation']['tmp_name'], __DIR__ . '/images/' . $_FILES['imageFormation']['name']);

    $images = new Images($connexion);
    $idImage = $images->insererPhoto($fileName);
  }

  $formations = new Formations($connexion);
  $id=$formations->creerFormation($titre, $description, $domaine, $cout, $placeMax, $lieux, $public, $objectifs, $contenu, $idImage);
  $session = new Session($connexion);
  $sessions=$session->getSession($id);
}
}


?>



<?php 
$intervenant = new Intervenant($connexion);
$intervenants = $intervenant->getIntervenants();





if (isset($_POST['intervenant'])){


  foreach ($sessions as $sess) {

    $id_intervenants=$sess['id_intervenants'];
    $datesD=$sess['datesD'];
    $id_intervenants=$sess['id_intervenants'];

    
    $intervenants = $intervenant->getIntervenantsNom($id_intervenants);
  }

}



?>


<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">

  <!-- Bouton de retour -->
  <div class="flex justify-start max-w-md mx-auto mb-4">
    <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
      &larr; Retour à l'accueil
    </a>
  </div>

  <form action="session.php" id="formulaire" method="post" enctype="multipart/form-data" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Créer une Session</h2>  

    <input type="hidden" id="id" name="id" value="<?php echo $id;?>" />

    <div>
      <label for="intervenant" class="block text-sm font-medium text-gray-700">Intervenant</label>
      <select name="intervenant" id="intervenant" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <?php foreach ($intervenants as $intervenant): ?>
          <option value="<?= $intervenant['id_intervenants']; ?>"><?= $intervenant['nom']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

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

    <!-- Bouton de soumission -->
    <div class="flex justify-center mt-6">
      <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Soumettre
      </button>
    </div>
  </form>
</div>

  <?php
  include 'include/footer.php'; ?>