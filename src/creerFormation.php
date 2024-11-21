<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
include 'classe/Images.php';




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
    


    if (isset($_FILES['imageFormation'])  ) {
      $fileName = $_FILES['imageFormation']['name'];
      echo $fileName;
      move_uploaded_file($_FILES['imageFormation']['tmp_name'], __DIR__ . '/images/' . $_FILES['imageFormation']['name']);

      $images = new Images($connexion);
      $idImage = $images->insererPhoto($fileName);


    }
    $formations = new Formations($connexion);
    $formations->creerFormation($titre, $description, $domaine, $cout, $placeMax, $dateDebut, $dateFin, $lieux, $public, $objectifs, $contenu, $datelimite,$idImage);

   //if ($formations) {
      // Redirection avec un paramètre de succès
      //header("Location: index.php?success=1");
     // exit();
  //} else {
   //   echo "Erreur lors de la création de la formation.";
 // }
    

    

}


?>

    <div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
  
  <!-- Bouton de retour -->
  <div class="flex justify-start max-w-md mx-auto mb-4">
    <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
      &larr; Retour à l'accueil
    </a>
  </div>
  
  <form action="creerFormation.php" id="formulaire" method="post" enctype="multipart/form-data" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Créer une Formation</h2>

    <div class="flex flex-col">
      <label for="Titre" class="text-blue-600 text-sm font-semibold mb-1">Titre</label>
      <input type="text" id="Titre" name="Titre" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="Description" class="text-blue-600 text-sm font-semibold mb-1">Description</label>
      <textarea id="Description" name="Description" rows="4" required
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
      <input type="number" id="cout" name="cout" min="0" step="0.01" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="placeMax" class="text-blue-600 text-sm font-semibold mb-1">Nombre de places maximum</label>
      <input type="number" id="placeMax" name="placeMax" min="1" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="DateDebut" class="text-blue-600 text-sm font-semibold mb-1">Date de début</label>
      <input type="date" id="DateDebut" name="DateDebut" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="DateFin" class="text-blue-600 text-sm font-semibold mb-1">Date de fin</label>
      <input type="date" id="DateFin" name="DateFin" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="public_concerne" class="text-blue-600 text-sm font-semibold mb-1">Public concerné</label>
      <input type="text" id="public_concerne" name="public_concerne" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="lieux" class="text-blue-600 text-sm font-semibold mb-1">Lieu</label>
      <input type="text" id="lieux" name="lieux" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="objectifs" class="text-blue-600 text-sm font-semibold mb-1">Objectifs</label>
      <textarea id="objectifs" name="objectifs" rows="3" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"></textarea>
    </div>

    <div class="flex flex-col">
      <label for="contenu" class="text-blue-600 text-sm font-semibold mb-1">Contenu</label>
      <textarea id="contenu" name="contenu" rows="3" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm"></textarea>
    </div>

    <div class="flex flex-col">
      <label for="Datelimite" class="text-blue-600 text-sm font-semibold mb-1">Date limite d'inscription</label>
      <input type="date" id="Datelimite" name="Datelimite" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <div class="flex flex-col">
      <label for="imageFormation" class="text-blue-600 text-sm font-semibold mb-1">Image de la formation</label>
      <input type="file" id="imageFormation" name="imageFormation" required
        class="px-4 py-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white shadow-sm" />
    </div>

    <button type="submit" onclick="location.href='index.php'"
      class="mt-8 px-4 py-2 w-full bg-blue-600 hover:bg-blue-700 text-sm text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
      Enregistrer
    </button>
    

  </form>
  <script>
  document.getElementById('formulaire').addEventListener('submit', function(event) {
      // Récupérer les valeurs des dates
      const sDate = new Date(document.getElementById('DateDebut').value);
      const eDate = new Date(document.getElementById('DateFin').value);

      // Vérifier que la date de fin est postérieure à la date de début
      if (eDate < sDate) {
        event.preventDefault(); // Empêche la soumission du formulaire
        alert("La date de fin doit être supérieure à la date de début !");
      }
    });

    document.getElementById('formulaire').addEventListener('submit', function(event) {
      // Récupérer les valeurs des dates
      const sDate = new Date(document.getElementById('DateDebut').value);
      const finIns = new Date(document.getElementById('Datelimite').value);

      // Vérifier que la date de fin est postérieure à la date de début
      if (sDate <= finIns) {
        event.preventDefault(); // Empêche la soumission du formulaire
        alert("La date de fin d'inscription ne peut pas être supérieur à la date de début de la formation !");
      }
    });

    

 

  </script>
        
</div>