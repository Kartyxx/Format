<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
session_start();




?>

<form action="connexion.php" method="post" class="">
        <input type="email" name="email" placeholder="Email" class="" required>
        <input type="password" name="mdp" placeholder="Entrez un pseudo" class="" required>
        <button id="" type="submit" class="">Se connecter</button>
    </form>




    <a href="inscription.php" class="text-white">Inscription</a>


    <?php 
include 'include/footer.php';
?>