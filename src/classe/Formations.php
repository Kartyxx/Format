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
}
?>