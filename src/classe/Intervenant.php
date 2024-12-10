<?php

class Intervenant
{
    private $pdo;




public function __construct($pdo) {
    $this->pdo=$pdo;
}


function getIntervenants(){
    
        $query = "Select * from intervenants";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $intervenants = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $intervenants;

}




}
?>