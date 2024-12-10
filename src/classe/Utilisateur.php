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
        $localisation = null
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

    public function sInscrire($prenom, $nom, $status, $email, $mdp, $adresse, $code_postal, $ville, $fonction, $idEntrerise){

        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $query = "INSERT INTO utilisateur (prenom, nom, statue, email, mot_de_passe, localisation, codeP, ville,fonction, id_entreprise) VALUES ('$prenom', '$nom', '$status', '$email', '$mdp', '$adresse', '$code_postal', '$ville', '$fonction','$idEntrerise')";
        $stmt = $this->pdo->prepare("INSERT INTO utilisateur (prenom, nom, status, email, mot_de_passe, localisation, codeP, ville, fonction, id_entreprise) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$prenom, $nom, $status, $email, $mdp, $adresse, $code_postal, $ville, $fonction, $idEntrerise]);    
        echo "Utilisateur bien créér";


    }

    public function selecTUser($id){

        $query = "Select * from utilisateur where id_utilisateur = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        $ReturnUser = $stmt->fetch(PDO::FETCH_ASSOC);
        return $ReturnUser;


    }



    public function getStatus($id){

        $query = "Select status from utilisateur where id_utilisateur = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        $Returnstatus = $stmt->fetch(PDO::FETCH_ASSOC);
        $status = $Returnstatus['status'];
        return $status;


    }

    public function recuperationUser(){

        $query = "Select nom, id_utilisateur , prenom from utilisateur where id_utilisateur";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $recupUser = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $recupUser;


    }

    


























}








?>

