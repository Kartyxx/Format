<?php

session_start();

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet">

    <title>Format</title>
</head>
<body class="bg-gray-100">
<nav class="bg-gray-800 shadow">
    <div class="container mx-auto p-4 flex justify-between items-center">

        <a href="index.php" class="text-white text-xl font-bold">Format</a>

        <div class="flex space-x-4 items-center">

            
            <?php 
            if (isset($_SESSION['status'])):
            if ($_SESSION['status'] == "secretaire") :?>
            <a href="valider.php" class="text-white hover:text-blue-300">Valider</a>
            <?php endif; ?>
            <?php endif; ?>


            <a href="index.php" class="text-white hover:text-blue-300">Accueil</a>
            <a href="perso.php" class="text-white hover:text-blue-300">Mes Informations</a>
            
            <a href="historique.php" class="text-white hover:text-blue-300">Historique</a>
            
            <a href="contact.php" class="text-white hover:text-blue-300">Contact</a>

            <?php if (isset($_SESSION['user_id'])) { ?>
                <a href="include/logout.php" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
                    Déconnexion
                </a>
            <?php } ?>
        </div>
    </div>
</nav>
</body>
</html>






