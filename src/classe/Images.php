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

    public function recupererNom($id)
    {
        $stmt = $this->pdo->prepare("Select id_photo from formations where id_formation = ?");
        $stmt->execute([$libelle]);
        $imageAray = $stmt->fetch();
        $imageId = $imageId['id_photo'];

        $stmt = $this->pdo->prepare("Select libelle from photo where id_photo = ?");
        $stmt->execute([$libelle]);

        return $lastInsertId;

    }


}