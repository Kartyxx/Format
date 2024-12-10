<?php

include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Utilisateur.php';
?>

<?php



$utilisateur = new Utilisateur($connexion);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $recuperer = $utilisateur->recuperationUser($id);
  }
}

// Récupération des sessions si un utilisateur est sélectionné
if (isset($_POST['id_utilisateur'])) {
    $id_utilisateur = $_POST['id_utilisateur'];
    $stmt = $pdo->prepare("
        SELECT u.nom, u.prenom, s.datesD, s.datesF, s.lieux
        FROM utilisateur u
        JOIN inscriptions i ON u.id_utilisateur = i.id_utilisateur
        JOIN sessions s ON i.id_sessions = s.id_sessions
        WHERE u.id_utilisateur = :id_utilisateur
    ");
    $stmt->execute(['id_utilisateur' => $id_utilisateur]);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $resultats = [];
}
?>


<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">
<body class="bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 min-h-screen">
    <div class="px-8 py-10 max-w-2xl mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Gestion des Formations</h2>

        <!-- Formulaire pour sélectionner un utilisateur -->
        <form method="post" action="" class="mb-6">
            <label for="id_utilisateur" class="block text-lg font-semibold text-blue-600 mb-2">Sélectionnez un utilisateur :</label>
            <div class="flex items-center gap-4">
                <select name="id_utilisateur" id="id_utilisateur" class="w-full px-4 py-2 border border-blue-300 rounded-lg">
                    <?php if (!empty($recuperer)): ?>
                        <?php foreach ($recuperer as $user): ?>
                            <option value="<?= htmlspecialchars($user['id_utilisateur']) ?>">
                                <?= htmlspecialchars($user['nom'] . ' ' . $user['prenom']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option disabled>Aucun utilisateur disponible</option>
                    <?php endif; ?>
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
                    Voir les sessions
                </button>
            </div>
        </form>

        <!-- Affichage des sessions de l'utilisateur -->
        <?php if (!empty($resultats)): ?>
            <table class="table-auto w-full border-collapse border border-blue-200 rounded-lg shadow-sm">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Nom</th>
                        <th class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Prénom</th>
                        <th class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Date de début</th>
                        <th class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Date de fin</th>
                        <th class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Lieu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultats as $index => $resultat): ?>
                        <tr class="<?= $index % 2 == 0 ? '' : 'bg-blue-100' ?>">
                            <td class="px-4 py-2 border border-blue-200"><?= htmlspecialchars($resultat['nom']) ?></td>
                            <td class="px-4 py-2 border border-blue-200"><?= htmlspecialchars($resultat['prenom']) ?></td>
                            <td class="px-4 py-2 border border-blue-200"><?= htmlspecialchars($resultat['datesD']) ?></td>
                            <td class="px-4 py-2 border border-blue-200"><?= htmlspecialchars($resultat['datesF']) ?></td>
                            <td class="px-4 py-2 border border-blue-200"><?= htmlspecialchars($resultat['lieux']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-blue-600 font-semibold mt-4">Aucune session disponible pour cet utilisateur.</p>
        <?php endif; ?>
    </div>
</body>
</div>
</html>





<?php include 'include/footer.php'; ?>