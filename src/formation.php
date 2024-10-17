<?php 
include 'include/header.php';
include 'include/connexionbdd.php';
include 'classe/Formations.php';
session_start();

$id=$_GET["id"];
echo $id;

?>

<?php 
include 'include/footer.php';
?>