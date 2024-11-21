<?php

class Formations
{
    private $pdo;




public function __construct($pdo) {
    $this->pdo=$pdo;
}


function getFormations(){
    
        $query = "Select * from formations";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $formations = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $formations;

}

function creerFormation($titre, $description, $domaine, $cout, $nombre_max_participants, $date_debut, $date_fin, $lieu, $public_concerne, $objectifs, $contenu, $date_limite_inscription, $image){

        $query = "INSERT INTO formations (titre, description, id_domaine, cout, nombre_max_participants, date_debut, date_fin, lieu, public_concerne, objectifs, contenu, date_limite_inscription, id_photo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$titre, $description, $domaine, $cout, $nombre_max_participants, $date_debut, $date_fin, $lieu, $public_concerne, $objectifs, $contenu, $date_limite_inscription, $image]);    
        echo "formation bien créér";
}

function suprimerFormation($id){

    $stmt = $this->pdo->prepare("Select id_photo from formations where id_formation = ?");
    $stmt->execute([$id]);
    $imageAray = $stmt->fetch();
    $imageId = $imageAray['id_photo'];

    $query = "DELETE * FROM photo where id_photo = ?";
    $stmt = $this->pdo->prepare($id);
    $stmt->execute([$id]);  

}

function recupFormationPrecise($id){
    
    $query = "Select * from formations where id_formation = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id]);
    $formations = $stmt->fetch(PDO::FETCH_ASSOC);
    return $formations;

}




}
?>