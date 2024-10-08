<?php 
include 'include/header.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}


echo "index".$_SESSION['user_id'];

?>


































<?php 
include 'include/footer.php';
?>