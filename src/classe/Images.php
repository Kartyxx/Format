<?php

class Images
{
    private $pdo;
    private $libelle;


    public function __construct(

        $pdo,
        $libelle = null,

    ) {
        $this->pdo=$pdo;
        $this->libelle = $libelle;
    }

    public function insererPhoto($libelle)
    {
        $stmt = $this->pdo->prepare("INSERT INTO photo (libelle) VALUES (?)");
        $stmt->execute([$libelle]);
        $lastInsertId = $this->pdo->lastInsertId();
        return $lastInsertId;

    }

    

}