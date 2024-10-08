<?php

class Utilisateur
{
    private $pdo;
    private $id_entreprise;
    private $nom;
    private $prenom;
    private $email;
    private $status;
    private $localisation;
    private $codeP;
    private $fonction;

    public function __construct(

        $pdo,
        $nom = null,
        $prenom = null,
        $id_entreprise = null,
        $email = null,
        $status = null,
        $codeP = null,
        $fonction = null,
        $localisation = null,

    ) {
        $this->pdo=$pdo;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_entreprise = $id_entreprise;
        $this->email = $email;
        $this->status = $status;
        $this->codeP = $codeP;
        $this->fonction = $fonction;
        $this->localisation = $localisation;       
    }


    public function seConnecter($id_utilisateur, $mot_de_passe)
    {

        $reqSQL = "SELECT * FROM utilisateur WHERE id = ?";
        $stmt = $this->pdo->prepare($reqSQL);
        $stmt->execute([$id_utilisateur]);
        $user = $stmt->fetch();

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            return $user;
        } else {
            return null;
        }
    }

    public function sInscrire($prenom, $nom, $status, $email, $mdp, $adresse, $code_postal, $ville, $fonction, $idEntrerise){

        $query = "INSERT INTO utilisateur (prenom, nom, status, email, mot_de_passe, localisation, codeP, ville,fonction, id_entreprise) VALUES ('$prenom', '$nom', '$status', '$email', '$mdp', '$adresse', '$code_postal', '$ville', '$fonction','$idEntrerise')";
        $stmt = $this->pdo->prepare("INSERT INTO utilisateur (prenom, nom, status, email, mot_de_passe, localisation, codeP, ville, fonction, id_entreprise) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$prenom, $nom, $status, $email, $mdp, $adresse, $code_postal, $ville, $fonction, $idEntrerise]);    
        echo "Utilisateur bien créér";


    }





























}








?>

