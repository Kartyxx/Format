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
<body class="bg-white-900">
<nav class="bg-stone-600 shadow ">
    <div class="container mx-auto p-4 flex justify-between">

<?php
    if (isset($_SESSION['user_id'])) {

    ?>    
    <a href="include/logout.php" class=" px-4  py-2 bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Déconnexion
    </a>
   <?php
    
}
?>
    <i class="fa-solid  ml-2" style="color: #e60f0f;"></i></a>
        <div>


        </div>
    </div>
</nav>




