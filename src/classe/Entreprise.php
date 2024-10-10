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

    public function seConnecter($email, $mot_de_passe)
    {

        

        $reqSQL = "SELECT * FROM utilisateur WHERE email = ?";
        $stmt = $this->pdo->prepare($reqSQL);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            $_SESSION['user_id']=$user['id_utilisateur'];
            return $user;
        } else {
            return null;
        }
    }

    

}