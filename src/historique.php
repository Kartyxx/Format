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

// Récupération des inscriptions
$utilisateur = new Utilisateur($connexion);
$inscriptions = $utilisateur->getInscription($_SESSION['user_id']);
?>

<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8">Mes Dernières Inscriptions</h1>
        <?php if (!empty($inscriptions)) : ?>
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-3 px-4 text-left">ID Inscription</th>
                        <th class="py-3 px-4 text-left">ID Session</th>
                        <th class="py-3 px-4 text-left">Date Inscription</th>
                        <th class="py-3 px-4 text-center">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inscriptions as $inscription) : ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-4"><?php echo $inscription['id_inscription']; ?></td>
                            <td class="py-3 px-4"><?php echo $inscription['id_sessions']; ?></td>
                            <td class="py-3 px-4"><?php echo $inscription['date_inscription']; ?></td>
                            <td class="py-3 px-4 text-center">
                                <span class="<?php echo getStatusClass($inscription['statut_inscription']); ?>">
                                    <?php echo ucfirst($inscription['statut_inscription']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-center text-gray-700">Aucune inscription trouvée.</p>
        <?php endif; ?>
    </div>
</div>

<?php
include 'include/footer.php';

// Fonction pour retourner la classe CSS basée sur le statut
function getStatusClass($status) {
    switch ($status) {
        case 'en cours':
            return 'bg-yellow-200 text-yellow-800 px-2 py-1 rounded font-bold';
        case 'refusé':
            return 'bg-red-200 text-red-800 px-2 py-1 rounded font-bold';
        case 'validé':
            return 'bg-green-200 text-green-800 px-2 py-1 rounded font-bold';
        default:
            return 'bg-gray-200 text-gray-800 px-2 py-1 rounded font-bold';
    }
}
?>
