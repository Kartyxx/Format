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
    $stmt->execute([$id]); // Corrigé : Passer $id dans un tableau
    $intervenants = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $intervenants;
}


function addSession($id_formations, $id_intervenants, $datesD, $datesF, $date_limite_inscription, $lieux) {
    $query = "INSERT INTO sessions (id_formations, id_intervenants, datesD, datesF, date_limite_inscription, lieux) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id_intervenants, $id_intervenants, $datesD, $datesF, $date_limite_inscription, $lieux]);   
        echo "session bien créér";
}



}
?>