<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';



if ($_SESSION['status']!="bénévoles"){
    header("Location: index.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $titre = $_POST['Titre'];
    $description = $_POST['Description'];
    $domaine = $_POST['domaine'];
    $cout = $_POST['cout'];
    $placeMax = $_POST['placeMax'];
    $dateDebut = $_POST['DateDebut'];
    $dateFin = $_POST['DateFin'];
    $public = $_POST['public_concerne'];
    $lieux = $_POST['lieux'];
    $objectifs = $_POST['objectifs'];
    $contenu = $_POST['contenu'];
    $datelimite = $_POST['Datelimite'];
    


    $fileName = $_FILES['imageFormation']['name'];
    echo $fileName;



    $formations = new Formations($connexion);

    $formations->creerFormation($titre, $description, $domaine, $cout, $placeMax, $dateDebut, $dateFin, $lieux, $public, $objectifs, $contenu, $datelimite);

}






?>

    <div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  
  <!-- Bouton de retour -->
  <div class="flex justify-start max-w-md mx-auto mb-4">
    <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
      &larr; Retour à l'accueil
    </a>
  </div>
  
  <form action="creerFormation.php" method="post" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Créer une Formation</h2>

    <div class="flex flex-col">
      <label for="Titre" class="text-blue-600 text-sm font-semibold mb-1">Titre</label>
      <input type="text" id="Titre" name="Titre"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="Description" class="text-blue-600 text-sm font-semibold mb-1">Description</label>
      <textarea id="Description" name="Description" rows="4" 
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"></textarea>
    </div>

    <div class="flex flex-col">
      <label for="domaine" class="text-blue-600 text-sm font-semibold mb-1">Domaine</label>
      <select class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" name="domaine">
        <option value="1">Gestion</option>
        <option value="2">Informatique</option>
        <option value="3">Développement durable</option>
        <option value="4">Secourisme</option>
        <option value="5">Communication</option>
      </select>
    </div>

    <div class="flex flex-col">
      <label for="cout" class="text-blue-600 text-sm font-semibold mb-1">Coût de la formation</label>
      <input type="number" id="cout" name="cout" min="0" step="0.01"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="placeMax" class="text-blue-600 text-sm font-semibold mb-1">Nombre de places maximum</label>
      <input type="number" id="placeMax" name="placeMax" min="1"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="DateDebut" class="text-blue-600 text-sm font-semibold mb-1">Date de début</label>
      <input type="date" id="DateDebut" name="DateDebut"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="DateFin" class="text-blue-600 text-sm font-semibold mb-1">Date de fin</label>
      <input type="date" id="DateFin" name="DateFin"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="public_concerne" class="text-blue-600 text-sm font-semibold mb-1">Public concerné</label>
      <input type="text" id="public_concerne" name="public_concerne"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="lieux" class="text-blue-600 text-sm font-semibold mb-1">Lieu</label>
      <input type="text" id="lieux" name="lieux"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="objectifs" class="text-blue-600 text-sm font-semibold mb-1">Objectifs</label>
      <textarea id="objectifs" name="objectifs" rows="3"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"></textarea>
    </div>

    <div class="flex flex-col">
      <label for="contenu" class="text-blue-600 text-sm font-semibold mb-1">Contenu</label>
      <textarea id="contenu" name="contenu" rows="3"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"></textarea>
    </div>

    <div class="flex flex-col">
      <label for="Datelimite" class="text-blue-600 text-sm font-semibold mb-1">Date limite d'inscription</label>
      <input type="date" id="Datelimite" name="Datelimite"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="imageFormation" class="text-blue-600 text-sm font-semibold mb-1">Image de la formation</label>
      <input type="file" id="imageFormation" name="imageFormation"
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <button type="submit" 
      class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Enregistrer
    </button>
  </form>
        
</div>