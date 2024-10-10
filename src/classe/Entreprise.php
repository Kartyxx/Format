<?php

class Entreprise
{
    private $pdo;
    private $id_entreprise;
    private $nomEntr;
    private $courriel;
    private $tel;
    private $fax;
    private $localisation;
    private $nomPrenomPdg;
    private $Icom;

    public function __construct(

        $pdo,
        $nomEntr = null,
        $courriel = null,
        $id_entreprise = null,
        $tel = null,
        $fax = null,
        $nomPrenomPdg = null,
        $Icom = null,

    ) {
        $this->pdo=$pdo;
        $this->nomEntr = $nomEntr;
        $this->courriel = $courriel;
        $this->id_entreprise = $id_entreprise;
        $this->tel = $tel;
        $this->fax = $fax;
        $this->nomPrenomPdg = $nomPrenomPdg;
        $this->Icom = $Icom;
    }

    public function creerEntreprise($nomEntr, $courriel, $tel, $fax, $nomPrenomPdg, $Icom)
    {
    echo 
    
    }

    

}