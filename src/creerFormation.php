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
















<?php
/*
<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';
include 'classe/Images.php';

if ($_SESSION['status'] != "bénévoles") {
    header("Location: index.php");
    exit();
}

// Gestion de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'creerFormation') {
        // Création de la formation
        $titre = $_POST['Titre'];
        $description = $_POST['Description'];
        $domaine = $_POST['domaine'];
        $cout = $_POST['cout'];
        $placeMax = $_POST['placeMax'];
        $lieu = $_POST['lieux'];
        $public = $_POST['public_concerne'];
        $objectifs = $_POST['objectifs'];
        $contenu = $_POST['contenu'];

        $idImage = null;
        if (isset($_FILES['imageFormation'])) {
            $fileName = $_FILES['imageFormation']['name'];
            move_uploaded_file($_FILES['imageFormation']['tmp_name'], __DIR__ . '/images/' . $fileName);
            $images = new Images($connexion);
            $idImage = $images->insererPhoto($fileName);
        }

        $formations = new Formations($connexion);
        $idFormation = $formations->creerFormation($titre, $description, $domaine, $cout, $placeMax, null, null, $lieu, $public, $objectifs, $contenu, null, $idImage);

        echo "<script>alert('Formation créée avec succès ! ID Formation: $idFormation');</script>";
    }

    if (isset($_POST['action']) && $_POST['action'] == 'ajouterSessions') {
        // Ajout des sessions
        $idFormation = $_POST['idFormation'];
        $sessionsData = $_POST['sessions'];

        foreach ($sessionsData as $session) {
            $intervenantId = $session['id_intervenant'];
            $dateDebutSession = $session['dateDebut'];
            $dateFinSession = $session['dateFin'];
            $lieuSession = $session['lieu'];

            $sessions = new Sessions($connexion);
            $sessions->ajouterSession($idFormation, $intervenantId, $dateDebutSession, $dateFinSession, $lieuSession);
        }

        echo "<script>alert('Sessions ajoutées avec succès !');</script>";
    }
}
?>

<div class="min-h-screen bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 py-10">
    <!-- Onglets -->
    <div class="flex justify-center space-x-4 mb-6">
        <button id="tabFormation" class="tab active px-6 py-2 bg-blue-600 text-white rounded-lg">
            Ajouter une Formation
        </button>
        <button id="tabSession" class="tab px-6 py-2 bg-gray-300 text-gray-700 rounded-lg">
            Ajouter des Sessions
        </button>
    </div>

    <!-- Section Ajouter Formation -->
    <div id="sectionFormation" class="tabContent">
        <form action="" method="post" enctype="multipart/form-data" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
            <input type="hidden" name="action" value="creerFormation">
            <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Créer une Formation</h2>

            <!-- Champs pour tous les attributs de formation -->
            <div class="flex flex-col">
                <label for="Titre" class="text-blue-600 text-sm font-semibold mb-1">Titre</label>
                <input type="text" id="Titre" name="Titre" required class="inputField" />
            </div>
            <div class="flex flex-col">
                <label for="Description" class="text-blue-600 text-sm font-semibold mb-1">Description</label>
                <textarea id="Description" name="Description" rows="4" required class="inputField"></textarea>
            </div>
            <div class="flex flex-col">
                <label for="domaine" class="text-blue-600 text-sm font-semibold mb-1">Domaine</label>
                <select id="domaine" name="domaine" required class="inputField">
                    <option value="1">Gestion</option>
                    <option value="2">Informatique</option>
                    <option value="3">Développement durable</option>
                    <option value="4">Secourisme</option>
                    <option value="5">Communication</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="cout" class="text-blue-600 text-sm font-semibold mb-1">Coût</label>
                <input type="number" id="cout" name="cout" min="0" step="0.01" required class="inputField" />
            </div>
            <div class="flex flex-col">
                <label for="placeMax" class="text-blue-600 text-sm font-semibold mb-1">Nombre max de participants</label>
                <input type="number" id="placeMax" name="placeMax" min="1" required class="inputField" />
            </div>
            <div class="flex flex-col">
                <label for="lieux" class="text-blue-600 text-sm font-semibold mb-1">Lieu</label>
                <input type="text" id="lieux" name="lieux" required class="inputField" />
            </div>
            <div class="flex flex-col">
                <label for="public_concerne" class="text-blue-600 text-sm font-semibold mb-1">Public Concerné</label>
                <input type="text" id="public_concerne" name="public_concerne" required class="inputField" />
            </div>
            <div class="flex flex-col">
                <label for="objectifs" class="text-blue-600 text-sm font-semibold mb-1">Objectifs</label>
                <textarea id="objectifs" name="objectifs" rows="3" required class="inputField"></textarea>
            </div>
            <div class="flex flex-col">
                <label for="contenu" class="text-blue-600 text-sm font-semibold mb-1">Contenu</label>
                <textarea id="contenu" name="contenu" rows="3" required class="inputField"></textarea>
            </div>
            <div class="flex flex-col">
                <label for="imageFormation" class="text-blue-600 text-sm font-semibold mb-1">Photo</label>
                <input type="file" id="imageFormation" name="imageFormation" required class="inputField" />
            </div>

            <button type="submit" class="submitButton">Créer Formation</button>
        </form>
    </div>

    <!-- Section Ajouter Sessions -->
    <div id="sectionSession" class="tabContent hidden">
        <form action="" method="post" class="space-y-6 px-8 py-10 max-w-md mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
            <input type="hidden" name="action" value="ajouterSessions">


            <div id="sessionsContainer">
                <!-- Champ dynamique pour les sessions -->
                <div class="sessionBlock">
                    <h3 class="text-blue-600 font-semibold">Session 1</h3>
                    <div class="flex flex-col">
                        <label for="id_intervenant" class="text-blue-600 text-sm font-semibold mb-1">Intervenant</label>
                        <input type="number" name="sessions[0][id_intervenant]" required class="inputField" />
                    </div>
                    <div class="flex flex-col">
                        <label for="dateDebut" class="text-blue-600 text-sm font-semibold mb-1">Date de Début</label>
                        <input type="datetime-local" name="sessions[0][dateDebut]" required class="inputField" />
                    </div>
                    <div class="flex flex-col">
                        <label for="dateFin" class="text-blue-600 text-sm font-semibold mb-1">Date de Fin</label>
                        <input type="datetime-local" name="sessions[0][dateFin]" required class="inputField" />
                    </div>
                    <div class="flex flex-col">
                        <label for="lieu" class="text-blue-600 text-sm font-semibold mb-1">Lieu</label>
                        <input type="text" name="sessions[0][lieu]" required class="inputField" />
                    </div>
                    <button type="button" class="removeButton mt-2 bg-red-500 text-white px-4 py-2 rounded-lg">
                        Supprimer cette Session
                    </button>
                </div>
            </div>

            <button type="button" id="addSession" class="addButton">Ajouter une session</button>
            <button type="submit" class="submitButton">Enregistrer les Sessions</button>
        </form>
    </div>
</div>

<script>
// JavaScript pour gérer les onglets et les champs dynamiques
document.addEventListener('DOMContentLoaded', function () {
    // Onglets
    const tabFormation = document.getElementById('tabFormation');
    const tabSession = document.getElementById('tabSession');
    const sectionFormation = document.getElementById('sectionFormation');
    const sectionSession = document.getElementById('sectionSession');

    tabFormation.addEventListener('click', function () {
        tabFormation.classList.add('active');
        tabSession.classList.remove('active');
        sectionFormation.classList.remove('hidden');
        sectionSession.classList.add('hidden');
    });

    tabSession.addEventListener('click', function () {
        tabSession.classList.add('active');
        tabFormation.classList.remove('active');
        sectionSession.classList.remove('hidden');
        sectionFormation.classList.add('hidden');
    });

    // Gestion des champs dynamiques pour les sessions
    const addSessionButton = document.getElementById('addSession');
    const sessionsContainer = document.getElementById('sessionsContainer');

    addSessionButton.addEventListener('click', function () {
        const sessionCount = document.querySelectorAll('.sessionBlock').length;
        const newSessionHTML = `
            <div class="sessionBlock">
                <h3 class="text-blue-600 font-semibold">Session ${sessionCount + 1}</h3>
                <div class="flex flex-col">
                    <label for="id_intervenant" class="text-blue-600 text-sm font-semibold mb-1">Intervenant</label>
                    <input type="number" name="sessions[${sessionCount}][id_intervenant]" required class="inputField" />
                </div>
                <div class="flex flex-col">
                    <label for="dateDebut" class="text-blue-600 text-sm font-semibold mb-1">Date de Début</label>
                    <input type="datetime-local" name="sessions[${sessionCount}][dateDebut]" required class="inputField" />
                </div>
                <div class="flex flex-col">
                    <label for="dateFin" class="text-blue-600 text-sm font-semibold mb-1">Date de Fin</label>
                    <input type="datetime-local" name="sessions[${sessionCount}][dateFin]" required class="inputField" />
                </div>
                <div class="flex flex-col">
                    <label for="lieu" class="text-blue-600 text-sm font-semibold mb-1">Lieu</label>
                    <input type="text" name="sessions[${sessionCount}][lieu]" required class="inputField" />
                </div>
                <button type="button" class="removeButton mt-2 bg-red-500 text-white px-4 py-2 rounded-lg">
                    Supprimer cette Session
                </button>
            </div>
        `;
        sessionsContainer.insertAdjacentHTML('beforeend', newSessionHTML);
        addRemoveButtonListeners();
    });

    // Supprimer une session
    function addRemoveButtonListeners() {
        const removeButtons = document.querySelectorAll('.removeButton');
        removeButtons.forEach(button => {
            button.addEventListener('click', function () {
                button.parentElement.remove();
            });
        });
    }

    addRemoveButtonListeners(); // Initialiser pour la première session
});
</script>


*/
?>