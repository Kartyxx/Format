<?php

class Intervenant
{
    private $pdo;




public function __construct($pdo) {
    $this->pdo=$pdo;
}


function getIntervenants($id){

        $query = "Select * from intervenants where id_domaine = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        $intervenants = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $intervenants;

}



function getDomaineIntervenants($id){

    $query = "
SELECT formations.id_domaine 
FROM formations
INNER JOIN sessions ON
sessions.id_formations = formations.id_formation
INNER JOIN interviens ON
interviens.id_sessions = sessions.id_sessions
INNER JOIN intervenants ON 
intervenants.id_intervenants = interviens.id_intervenants 
WHERE intervenants.id_domaine = ? ;";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id]);
    $domaine = $stmt->fetch(PDO::FETCH_ASSOC);
    $domaine= $domaine['id_domaine'];
    return $domaine;
}



function getIntervenantsNom($id_intervenants){
    
    $query = "Select nom from intervenants, interviens, sessions where interviens.id_intervenants = intervenants.id_intervenants and interviens.id_sessions = sessions.id_sessions and sessions.id_sessions = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id_intervenants]);
    $intervenants = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $intervenants;

}


function intervention($id_intervenants, $id_sessions){
    
    $query = "INSERT INTO interviens (id_intervenants, id_sessions) VALUES (?,?)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id_intervenants, $id_sessions]);
}



}
?>