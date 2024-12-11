<?php

include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Session.php';
include 'classe/Intervenant.php';

$user_id = $_SESSION['user_id'];
$id_session = $_GET['id'];
$today = date("Y-m-d H:i:s");
$session = new Session($connexion);

$nbSession = $session->coutSession($user_id);
$nbsess = $nbSession[0]['nb'];

?>

<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
    <div class="container mx-auto px-4">
        <div class="flex justify-between max-w-2xl mx-auto mb-4">
            <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
                 Retour à l'accueil
            </a>
        </div>

        <div class="bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg p-8">
            <?php if ($nbsess < 3): ?>
                <?php 
                    $session->inscriptionSession($user_id, $id_session, $today); 
                ?>
                <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Inscription Réussie</h2>
                <p class="text-center text-blue-800">Vous avez été inscrit avec succès à la session.</p>
            <?php else: ?>
                <h2 class="text-2xl font-bold text-center text-red-700 mb-6">Limite Atteinte</h2>
                <p class="text-center text-red-800">Vous êtes déjà inscrit à 3 sessions. Vous ne pouvez pas vous inscrire à plus de sessions.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>