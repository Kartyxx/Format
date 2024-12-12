<?php

include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Utilisateur.php';
?>


<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">

<tbody>
    <?php

$utilisateurSelect = new Utilisateur($connexion);
$utilisateurs = $utilisateurSelect->selecTUser($_SESSION['user_id']);



if ($utilisateurs) {
     
      $id = $utilisateurs['id_utilisateur'];
      $lastname = $utilisateurs['nom'] ;
      $name = $utilisateurs['prenom'] ;
      $mail = $utilisateurs['email'] ;
      $mdp = $utilisateurs['mot_de_passe'] ;
      $status = $utilisateurs['status'] ;
      $localisation = $utilisateurs['localisation'] ;
      $codep = $utilisateurs['codeP'] ;
      $ville = $utilisateurs['ville'] ;
      $fonction = $utilisateurs['fonction'] ;
}
?>

<div class="px-8 py-10 max-w-2xl mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Informations Personnelles</h2>
    <table class="table-auto w-full border-collapse border border-blue-200 rounded-lg shadow-sm">
      <tbody>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Nom</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $lastname ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Prenom</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $name ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">E-Mail</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $mail ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Status</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $status ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Localisation</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $localisation ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Code Postale</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $codep ?></td>
        </tr>
        <tr>
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Ville</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $ville ?></td>
        </tr>
        <tr class="bg-blue-100">
          <td class="px-4 py-2 font-semibold text-blue-600 border border-blue-200">Fonction</td>
          <td class="px-4 py-2 border border-blue-200"><?php echo $fonction ?></td>
        </tr>
      </tbody>
    </table>
    <div class="mt-6 text-center">
      <a href="modificationperso.php" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
        Modifier mes informations
      </a>
    </div>
</div>




<?php include 'include/footer.php'; ?>