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

function getIntervenantsPrecis($id_intervenants){
    
    $query = "Select nom from intervenants where id_intervenants = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($id_intervenants);
    $intervenants = $stmt->fetch(PDO::FETCH_ASSOC);
    return $intervenants;

}


}
?>