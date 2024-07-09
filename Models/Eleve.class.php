<?php

class Eleve {

    private $matricule;
    private $nom;
    private $postnom;
    private $prenom;
    private $genre;
    private $datenais;
    private $adresse;
    private $idOption;
    private $idClasse;

    public function __construct($matricule, $nom, $postnom, $prenom,$genre, $datenais, $adresse, $idOption, $idClasse) {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->postnom = $postnom;
        $this->prenom = $prenom;
        $this->genre = $genre;
        $this->datenais = $datenais;
        $this->adresse = $adresse;
        $this->idOption = $idOption;
        $this->idClasse = $idClasse;
    }

   

        // Methode enregistrer (Create)
        public function enregistrer($connexion) {
            // Préparer la requête SQL pour l'insertion
            $requete = "INSERT INTO `eleve` (Matricule, Nom, Postnom, Prenom,genre, Datenais, Adresse, IdOption, IdClasse) VALUES (:matricule, :nom, :postnom, :prenom,:genre, :datenais, :adresse, :idOption, :idClasse)";
            $stmt = $connexion->prepare($requete);

            // Lier les paramètres avec les valeurs
            $stmt->bindParam(':matricule', $this->matricule);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':postnom', $this->postnom);
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':genre', $this->genre);
            $stmt->bindParam(':datenais', $this->datenais);
            $stmt->bindParam(':adresse', $this->adresse);
            $stmt->bindParam(':idOption', $this->idOption);
            $stmt->bindParam(':idClasse', $this->idClasse);

            // Exécuter la requête et vérifier si elle réussit
            if ($stmt->execute()) {
                $message="Elève enregistré avec succès!";
                echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
            } else {           
                $message="Échec de l'enregistrement de l'élève!";
                echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
            }
        }    
        // Methode modifier (Update)
        public function modifier($connexion,$IdEleve) {
            // Préparer la requête SQL pour la mise à jour
            $requete = "UPDATE `eleve` SET Nom = :nom, Postnom = :postnom, Prenom = :prenom,Genre=:genre ,Datenais = :datenais, Adresse = :adresse, IdOption = :idOption, IdClasse = :idClasse,Matricule=:matricule WHERE IdEleve = :IdEleve";
            $stmt = $connexion->prepare($requete);
           
            // Lier les paramètres avec les valeurs
            $stmt->bindParam(':IdEleve', $IdEleve);
            $stmt->bindParam(':matricule', $this->matricule);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':postnom', $this->postnom);
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':genre', $this->genre);
            $stmt->bindParam(':datenais', $this->datenais);
            $stmt->bindParam(':adresse', $this->adresse);
            $stmt->bindParam(':idOption', $this->idOption);
            $stmt->bindParam(':idClasse', $this->idClasse);
    
            // Exécuter la requête et vérifier si elle réussit
            if ($stmt->execute()) {
                $message="Elève modifié avec succès !";
                echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
            } else {                
                $message="Échec de la modification de l'élève !";
                echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
            }
        }
    
        // Methode supprimer (Delete)
        public function supprimer($connexion,$IdEleve) {
            // Préparer la requête SQL pour la suppression
            $requete = "DELETE FROM Eleve WHERE IdEleve = :IdEleve";
            $stmt = $connexion->prepare($requete);
    
            // Lier le paramètre avec la valeur
            $stmt->bindParam(':IdEleve', $IdEleve);
    
            // Exécuter la requête et vérifier si elle réussit
            if ($stmt->execute()) {

                $message="Elève supprimé avec succès !";
                echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
            } else {
               
                $message="Échec de la suppression de l'élève !";
                echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
            }
        }
}
    