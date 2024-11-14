<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
session_start();



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
    
    $imageFormation = $_POST['imageFormation'];
    $imageFormation = base64_encode($imageFormation);




    $formations = new Formations($connexion);

    $formations->creerFormation($titre, $description, $domaine, $cout, $placeMax, $dateDebut, $dateFin, $lieux, $public, $objectifs, $contenu, $datelimite, $imageFormation);

}






?>


<!--<form action="creerFormation.php" method="post">
<label for="Titre">Titre</label><br>
<input type="text" id="" name="Titre" class="bg-gray-200 m-3"><br>

<label for="Description">Description</label>
<textarea id="" name="Description" rows="5" cols="33" class="bg-gray-200 m-3"></textarea>

<label for="domaine">Domaine</label>
        <select class="bg-gray-200 m-3" name="domaine">
  <option value="gestion">gestion</option>
  <option value="informatique">informatique</option>
  <option value="développement durable">développement durable</option>
  <option value="secourisme">secourisme</option>
  <option value="communication">communication</option>
</select> 

<label for="cout">Cout de la formation</label>
<input type="number" id="" name="cout" min="" max="" class="bg-gray-200 m-3">

<label for="placeMax">Nombre de place maximum</label>
<input type="number" id="" name="placeMax" min="" max="" class="bg-gray-200 m-3">

<label for="DateDebut">Saisir date début</label>
<input type="date" id="" name="DateDebut">

<label for="DateFin">Saisir date fin</label>
<input type="date" id="" name="DateFin">

<label for="public_concerne">public concerne</label><br>
<input type="text" id="" name="public_concerne" class="bg-gray-200 m-3"><br>

<label for="lieux">lieux</label><br>
<input type="text" id="" name="lieux" class="bg-gray-200 m-3"><br>

<label for="objectifs">objectifs</label><br>
<input type="text" id="" name="objectifs" class="bg-gray-200 m-3"><br>

<label for="contenu">contenu</label><br>
<input type="text" id="" name="contenu" class="bg-gray-200 m-3"><br>

<label for="Datelimite">Saisir date limite</label>
<input type="date" id="" name="Datelimite">

<label for="imageFormation">Image Formation</label>
    <input type="file" name="imageFormation">
    <button type="submit">Enregistrer</button>

<button type="submit">Soumettre</button>
</form>-->







<!--<form action="creerFormation.php" method="post" class="space-y-6 px-4 max-w-sm mx-auto font-[sans-serif]">
      <div class="flex items-center">
        <label for="Titre" class="text-gray-400 w-36 text-sm">Titre</label>
        <input type="text" id="" name="Titre"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
      </div>


      <div class="flex items-center">
        <label for="Description" class="text-gray-400 w-36 text-sm">Description</label>
        <textarea id="" name="Description" rows="5" cols="33"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white"></textarea>
      </div>


      <div class="flex items-center">
        <label for="domaine" class="text-gray-400 w-36 text-sm">Domaine</label>
        <select class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" name="domaine">
            <option value="gestion">gestion</option>
            <option value="informatique">informatique</option>
            <option value="développement durable">développement durable</option>
            <option value="secourisme">secourisme</option>
            <option value="communication">communication</option>
        </select>         
      </div>

    
      <div class="flex items-center">
        <label for="cout" class="text-gray-400 w-36 text-sm">Cout de la formation</label>
        <input type="number" id="" name="cout" min="" max=""
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
      </div>


    <div class="flex items-center">
        <label for="placeMax" class="text-gray-400 w-36 text-sm">Nombre de place maximum</label>
        <input type="number" id="" name="placeMax" min="" max=""
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>


    <div class="flex items-center">
        <label for="DateDebut" class="text-gray-400 w-36 text-sm">Saisir date début</label>
        <input type="date" id="" name="DateDebut"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>

    

    <div class="flex items-center">
        <label for="DateFin" class="text-gray-400 w-36 text-sm">Saisir date fin</label>
        <input type="date" id="" name="DateFin"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>

    <div class="flex items-center">
        <label for="public_concerne" class="text-gray-400 w-36 text-sm">Public concerne</label>
        <input type="text" id="" name="public_concerne"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>

    <div class="flex items-center">
        <label for="lieux" class="text-gray-400 w-36 text-sm">Lieux</label>
        <input type="text" id="" name="lieux"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>

    <div class="flex items-center">
        <label for="objectifs" class="text-gray-400 w-36 text-sm">Objectifs</label>
        <input type="text" id="" name="objectifs"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>

    <div class="flex items-center">
        <label for="contenu" class="text-gray-400 w-36 text-sm">Contenu</label>
        <input type="text" id="" name="contenu"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>

    <div class="flex items-center">
        <label for="Datelimite" class="text-gray-400 w-36 text-sm">Saisir date limite</label>
        <input type="date" id="" name="Datelimite"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>
   

    <div class="flex items-center">
        <label for="imageFormation" class="text-gray-400 w-36 text-sm">Image Formation</label>
        <input type="file" name="imageFormation"
          class="px-2 py-2 w-full border-b-2 focus:border-[#333] outline-none text-sm bg-white" />
    </div>


      <button type="button"
        class="!mt-8 px-6 py-2 w-full bg-[#333] hover:bg-[#444] text-sm text-white mx-auto block">Enregistrer</button>
    </form>-->









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
        <option value="gestion">Gestion</option>
        <option value="informatique">Informatique</option>
        <option value="développement durable">Développement durable</option>
        <option value="secourisme">Secourisme</option>
        <option value="communication">Communication</option>
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