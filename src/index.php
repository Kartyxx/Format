<?php
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
include 'classe/Images.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: connexion.php");
  exit();
}

$formations = new Formations($connexion);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $tableFormat = $formations->suprimerFormation($id);
  }
}


$tableFormat = $formations->getFormations();


$utilisateur = new Utilisateur($connexion);
$status = $utilisateur->getStatus($_SESSION['user_id']);
$_SESSION['status'] = $status;
?>

<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">

  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Nos Formations</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <?php foreach ($tableFormat as $formation) :
        $images = new Images($connexion);
        $imageName = $images->recupererNom($formation['id_formation']);
      ?>

        <!-- Formation Card -->
        <a href="formation.php?id=<?php echo $formation['id_formation']; ?>" class="group block bg-white shadow-xl rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
          <?php if (!empty($formation['id_photo'])) : ?>
            <img src="images/<?php echo $imageName; ?>" alt="Image de la formation" class="w-full h-56 object-cover group-hover:opacity-80" />
          <?php endif; ?>

          <!-- Formation details -->
          <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-800 mb-2 group-hover:text-blue-600"><?php echo htmlspecialchars($formation['titre']); ?></h3>
            <p class="text-gray-600 text-sm mb-3 line-clamp-3"><?php echo htmlspecialchars($formation['description']); ?></p>
            <div class="flex justify-between text-gray-600 text-sm">
              <p><?php echo htmlspecialchars($formation['cout']); ?> €</p>
            </div>
          </div>
        </a>
        
      <?php endforeach; ?>
    </div>


    <!-- Button to create a formation for volunteers -->
    <?php if ($status == "directeur"|| $status == "secretaire") : ?>
      <div class="flex justify-center mt-10">
        <a href="creerFormation.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg text-lg px-6 py-3 transition duration-300 transform hover:scale-105">
          Créer une formation
        </a>
      </div>
    <?php endif; ?>
  </div>

</div>

<?php include 'include/footer.php'; ?>
