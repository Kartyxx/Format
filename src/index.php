<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
include 'classe/Utilisateur.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

    
$formations = new Formations($connexion);
$tableFormat= $formations->getFormations();

$utilisateur = new Utilisateur($connexion);
$status= $utilisateur->getStatus($_SESSION['user_id']);
$_SESSION['status']=$status;
?>

<div class="flex flex-wrap justify-center">

<?php
    foreach ($tableFormat as $formation) {

        ?>
        <a href="formation.php?id=<?php echo $formation['id_formation']; ?>">
        <div class="text-center border-2 border-black rounded-lg w-[350px] h-[250px] flex flex-col items-center justify-start overflow-hidden m-3">
            <?php
            if (!empty($formation['image'])) {
                $imageData = base64_encode($formation['image']);
                echo '<img src="data:image/png;base64,' . $imageData . '" alt="Image de la formation" class="w-full h-auto" />';
            }
            ?>
            <h3 class="mt-2"><?php echo htmlspecialchars($formation['titre']); ?></h3>
            <p class="text-sm"><?php echo htmlspecialchars($formation['description']); ?></p>
        </a>
        </div>
        <?php
        }
        ?>
    

</div>
<?php 
if ($status="bénévoles"){
    ?>
    
    <a classe="" href="creerFormation.php">
    <button type="button" class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">creer une formation</button>
 

    </a>


<?php 
}
?>


<?php 
include 'include/footer.php';
?>