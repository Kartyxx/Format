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

function creerFormation($titre, $description, $domaine, $cout, $nombre_max_participants, $lieu, $public_concerne, $objectifs, $contenu, $image){

        $query = "INSERT INTO formations (titre, description, id_domaine, cout, nombre_max_participants, lieu, public_concerne, objectifs, contenu, id_photo) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$titre, $description, $domaine, $cout, $nombre_max_participants, $lieu, $public_concerne, $objectifs, $contenu, $image]);    
        echo "formation bien créér";
}

function suprimerFormation($id){

    $query = "DELETE FROM formations where id_formation = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id]);  

}

function recupFormationPrecise($id){
    
    $query = "Select * from formations where id_formation = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id]);
    $formations = $stmt->fetch(PDO::FETCH_ASSOC);
    return $formations;

}

function modifierFormation($id, $titre, $description, $domaine, $cout, $nombre_max_participants, $lieu, $public_concerne, $objectifs, $contenu){



    $query = "UPDATE formations
    SET 
        titre = ?,
        description = ?,
        id_domaine = ?,
        cout = ?,
        nombre_max_participants = ?,
        lieu = ?,
        public_concerne = ?,
        objectifs = ?,
        contenu = ?
    WHERE id_formation = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$titre, $description, $domaine, $cout, $nombre_max_participants, $lieu, $public_concerne, $objectifs, $contenu, $id]); 
    
    
    /*$query = "UPDATE formations
    SET 
        titre = $titre,
        description = $description,
        id_domaine = $domaine,
        cout = $cout,
        nombre_max_participants = $nombre_max_participants,
        date_debut = $date_debut,
        date_fin = $date_fin,
        lieu = $lieu,
        public_concerne = $public_concerne,
        objectifs = $objectifs,
        contenu = $contenu,
        date_limite_inscription = $date_limite_inscription
    WHERE id_formation = $id";

    echo $query;*/
    return $id.$titre;   
}


}
?>