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



    public function inscriptionValide(){

        $query = "Select * from inscriptions where statut_inscription = 'en cours'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $ReturnUser = $stmt->fetchall(PDO::FETCH_ASSOC);
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






    public function refuserInscription($id_inscription) {
        $query = "UPDATE inscriptions SET statut_inscription = 'refusé' WHERE id_inscription = :id_inscription";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_inscription', $id_inscription, PDO::PARAM_INT);
        return $stmt->execute(); // Retourne true si la requête a réussi
    }
    
    public function accepterInscription($id_inscription) {
        $query = "UPDATE inscriptions SET statut_inscription = 'validé' WHERE id_inscription = :id_inscription";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_inscription', $id_inscription, PDO::PARAM_INT);
        return $stmt->execute(); // Retourne true si la requête a réussi
    }
    





    public function getInscription($id){

        $query = "Select * from inscriptions where id_participant = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        $inscription = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $inscription;


    }

    public function updateUtilisateur(
        $id, 
        $nom, 
        $prenom, 
        $email, 
        $localisation, 
        $codeP, 
        $ville, 
        $fonction, 
        $status
    ) {            // Préparation de la requête SQL
            $query = "UPDATE utilisateur SET 
                        nom = :nom, 
                        prenom = :prenom, 
                        email = :email, 
                        localisation = :localisation, 
                        codeP = :codeP, 
                        ville = :ville, 
                        fonction = :fonction, 
                        status = :status 
                      WHERE id_utilisateur = :id";
    
            $stmt = $this->pdo->prepare($query);
    
            // Liaison des paramètres
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':localisation', $localisation, PDO::PARAM_STR);
            $stmt->bindParam(':codeP', $codeP, PDO::PARAM_STR);
            $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
            $stmt->bindParam(':fonction', $fonction, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    
            // Exécution de la requête
            if ($stmt->execute()) {
                echo "Les données ont été mises à jour avec succès.";
            } else {
                echo "Une erreur est survenue lors de la mise à jour.";
            }
    
    }
    


}








?>

