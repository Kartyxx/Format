<?php 
include 'include/header.php';
echo "index";

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}




?>


































<?php 
include 'include/footer.php';
?>