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



}
?>