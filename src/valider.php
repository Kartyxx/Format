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
$inscriptions = $utilisateur->inscriptionValide();
?>

<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8">Inscriptions à valider</h1>
        <?php if (!empty($inscriptions)) : ?>
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-3 px-4 text-left">ID Participant</th>
                        <th class="py-3 px-4 text-left">ID Session</th>
                        <th class="py-3 px-4 text-left">Date Inscription</th>
                        <th class="py-3 px-4 text-left">Statut</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inscriptions as $inscription) : ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-4"><?php echo $inscription['id_participant']; ?></td>
                            <td class="py-3 px-4"><?php echo $inscription['id_sessions']; ?></td>
                            <td class="py-3 px-4"><?php echo $inscription['date_inscription']; ?></td>
                            <td class="py-3 px-4"><?php echo $inscription['statut_inscription']; ?></td>
                            <td class="py-3 px-4 text-center">
                                <form method="post" class="inline">
                                    <input type="hidden" name="id_inscription" value="<?php echo $inscription['id_inscription']; ?>">
                                    <button type="submit" name="action" value="validé" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                        Accepter
                                    </button>
                                </form>
                                <form method="post" class="inline">
                                    <input type="hidden" name="id_inscription" value="<?php echo $inscription['id_inscription']; ?>">
                                    <button type="submit" name="action" value="refusé" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                        Refuser
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-center text-gray-700">Aucune inscription à valider pour le moment.</p>
        <?php endif; ?>
    </div>
</div>

<?php
include 'include/footer.php';

// Traitement des actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_inscription = intval($_POST['id_inscription']);
    $action = $_POST['action'];

    if ($action === 'validé') {
        // Appeler une méthode pour accepter l'inscription
        $utilisateur->accepterInscription($id_inscription);
    } elseif ($action === 'refusé') {
        // Appeler une méthode pour refuser l'inscription
        $utilisateur->refuserInscription($id_inscription);
    }

    // Rediriger pour éviter le resoumission du formulaire
}
?>
