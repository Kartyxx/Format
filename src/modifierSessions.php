<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Session.php';
include 'classe/Intervenant.php';


if (isset($_GET['id_sessions'])){
    

    $id_sessions = $_GET['id_sessions'];

}
if (isset($_POST['id_sessions'])){
    

    $id_sessions = $_POST['id_sessions'];

}



$sessionC=new Session($connexion);



if (isset($_POST['lieux'])){
    

    $lieux = $_POST['lieux'];
    $dateD = $_POST['datesD'];
    $dateF = $_POST['datesF'];
    $date_limite_inscription = $_POST['limit'];

    $sessionC->updateSession($dateD, $dateF, $date_limite_inscription, $lieux, $id_sessions ) ;

}

$session = $sessionC->getUniqueSession($id_sessions);
$date_limite_inscription = $session['date_limite_inscription'];
$datesF = $session['datesF'];
$datesD = $session['datesD'];
$lieux = $session['lieux'];

?>


<div class="bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg p-8">
      <div class="flex justify-start mb-4">
        <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-200">
          &larr; Retour à l'accueil
        </a>
      </div>
      <form action="modificationSession.php" id="formulaire" method="post" enctype="multipart/form-data" class="space-y-6">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Modifier une Session</h2>

        <!-- Champ pour la date de début -->
        <div>
          <label for="datesD" class="block text-sm font-medium text-gray-700">Date début</label>
          <input type="datetime-local" value="<?php echo $datesD?>" require id="datesD" name="datesD" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <input type="hidden" id="id_sessions" name="id_sessions" value="<?php echo $id_sessions; ?>" />

        <!-- Champ pour la date de fin -->
        <div>
          <label for="datesF" class="block text-sm font-medium text-gray-700">Date fin</label>
          <input type="datetime-local" value="<?php echo $datesF?>"  require id="datesF" name="datesF" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Champ pour la date limite -->
        <div>
          <label for="limit" class="block text-sm font-medium text-gray-700">Date limite</label>
          <input type="date" value="<?php echo $date_limite_inscription?>"  require id="limit" name="limit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
          <label for="lieux" class="block text-sm font-medium text-gray-700">Lieux</label>
          <input type="text" value="<?php echo $lieux?>" id="lieux" name="lieux" require class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Bouton de soumission -->
        <div class="text-right">
          <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Soumettre
          </button>



        </div>
      </form>
    </div>