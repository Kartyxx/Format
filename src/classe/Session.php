<?php

class Session
{
    private $pdo;




public function __construct($pdo) {
    $this->pdo=$pdo;
}


function getSession($id) {
    $query = "SELECT * FROM sessions WHERE id_formations = ?";

    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$id]); 
    $session = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $session;
}





function addSession($id_formations, $datesD, $datesF, $date_limite_inscription, $lieux) {

    $query = "INSERT INTO sessions (id_formations, datesD, datesF, date_limite_inscription, lieux) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id_formations, $datesD, $datesF, $date_limite_inscription, $lieux]);   
        echo "session bien créér";
        $lastInsertId = $this->pdo->lastInsertId();
        return $lastInsertId;

}



function inscriptionSession($id_participant, $id_sessions,	$date_inscription) {

    $query = "INSERT INTO inscriptions (id_participant, id_sessions, date_inscription, statut_inscription) VALUES (?,?,?,'en cours')";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id_participant, $id_sessions, $date_inscription]);   
        

}


function coutSession($id_utilisiteur) {

    $query = "
SELECT COUNT(inscriptions.id_inscription) As nb
FROM inscriptions
INNER JOIN utilisateur
ON inscriptions.id_participant = utilisateur.id_utilisateur
WHERE utilisateur.id_utilisateur = ? ;";



        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id_utilisiteur]);
        $nbSession = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $nbSession;

}







}
?>