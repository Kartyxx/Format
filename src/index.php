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
$tableFormat = $formations->getFormations();

$utilisateur = new Utilisateur($connexion);
$status = $utilisateur->getStatus($_SESSION['user_id']);
$_SESSION['status'] = $status;
?>

<div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  
  <div class="flex flex-wrap justify-center gap-6">
    <?php foreach ($tableFormat as $formation): 
      
      $images = new Images($connexion);
      $imageName = $images->recupererNom($formation['id_formation']);
      ?>



      <a href="formation.php?id=<?php echo $formation['id_formation']; ?>" class="block w-80 bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-200 hover:scale-105 hover:shadow-xl">
        <?php if (!empty($formation['id_photo'])): ?>
          <img src="images/<?php echo $imageName; ?>" alt="Image de la formation" class="w-full h-40 object-cover" />
        <?php endif; ?>

        <!-- Détails de la formation -->
        <div class="p-4">
          <h3 class="text-xl font-semibold text-blue-700 mb-2"><?php echo htmlspecialchars($formation['titre']); ?></h3>
          <p class="text-gray-600 text-sm line-clamp-3"><?php echo htmlspecialchars($formation['description']); ?></p>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Bouton de création de formation pour les bénévoles -->
  <?php if ($status == "bénévoles"): ?>
    <div class="flex justify-center mt-8">
      <a href="creerFormation.php" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
        Créer une formation
      </a>
    </div>
  <?php endif; ?>
</div>

<?php include 'include/footer.php'; ?>