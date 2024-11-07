<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Utilisateur.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $status = $_POST['status'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $fonction = $_POST['fonction'];
    $eNomEntreprise = $_POST['NomEntreprise'];
    $emailEntreprise = $_POST['emailEntreprise'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $nomPrenomPdg = $_POST['nomPrenomPdg'];
    $NumIcom = $_POST['NumIcom'];
    $idEntrerise = $_POST['idEntrerise'];

    // var_dump($_POST);


    $utilisateur = new Utilisateur($connexion);
    $utilisateur->sInscrire($prenom, $nom, $status, $email, $mdp, $adresse, $code_postal, $ville, $fonction, $idEntrerise);
    
}
?>




<form action="inscription.php" method="post">
    <h2>Employés</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="mdp" placeholder="Entrez un mot de passe" required>

    <input type="radio" id="1" name="status" value="bénévoles">
    <label for="1">Bénévoles</label><br>
    <input type="radio" id="2" name="status" value="salariés">
    <label for="2">Salariés</label><br>

    <label for="fonction">Fonction :</label>
    <input type="text" id="fonction" name="fonction" class="m-4" placeholder="Votre fonction" required>

    <label for="prenom">Saisir Prénom :</label>
    <input type="text" id="prenom" name="prenom" placeholder="Votre Prénom" required>

    <label for="nom">Saisir Nom :</label>
    <input type="text" id="nom" name="nom" placeholder="Votre Nom" required>

    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse" placeholder="Votre adresse" required>

    <label for="code_postal">Code Postal :</label>
    <input type="text" id="code_postal" name="code_postal" placeholder="Votre code postal" required>

    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" placeholder="Votre ville" required>

    
    <label for="idEntrerise">Id entreprise :</label>
    <input type="text" id="idEntrerise" name="idEntrerise" placeholder="id de votre entreprise" required>

    <h2>Entreprise</h2>
    <label for="NomEntreprise">Nom Entreprise :</label>
    <input type="text" id="NomEntreprise" name="NomEntreprise" placeholder="Nom Entreprise" >

    <input type="email" name="emailEntreprise" placeholder="Email de l'entreprise" >

    <label for="tel">Téléphone :</label>
    <input type="text" id="tel" name="tel" placeholder="Téléphone">

    <label for="fax">Fax :</label>
    <input type="text" id="fax" name="fax" placeholder="Fax de l'entreprise"> 

    <label for="nomPrenomPdg">Nom et Prénom du PDG :</label>
    <input type="text" id="nomPrenomPdg" name="nomPrenomPdg" placeholder="Nom et Prénom du PDG" >

    <label for="NumIcom">Numéro Icom :</label>
    <input type="text" id="NumIcom" name="NumIcom" placeholder="Numéro Icom" > 

    <button type="submit">Soumettre</button>


    <br><br>
    <a href="connexion.php" class="">connexion</a>

</form>
