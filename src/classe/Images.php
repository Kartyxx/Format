<?php

class Images
{
    private $pdo;


    public function __construct(

        $pdo,

    ) 
    
    {
        $this->pdo=$pdo;
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
        $stmt->execute([$id]);
        $imageAray = $stmt->fetch();
        $imageId = $imageAray['id_photo'];

        
        $stmt1 = $this->pdo->prepare("Select libelle from photo where id_photo = ?");
        $stmt1->execute([$imageId]);
        $imageAray1 = $stmt1->fetch();
        $imagename = $imageAray1['libelle'];
        return $imagename;

    }


}