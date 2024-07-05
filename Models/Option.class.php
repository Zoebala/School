<?php

class Option {
    private $libOption;

    public function __construct($libOption) {
       
        $this->libOption = $libOption;
        
    }

    // Methode enregistrer (Create)
    public function enregistrer($connexion) {
        // Préparer la requête SQL pour l'insertion
        $requete = "INSERT INTO `option` (LibOption) VALUES (:libOption)";
        $stmt = $connexion->prepare($requete);
        // Lier les paramètres avec les valeurs
        $stmt->bindParam(':libOption', $this->libOption);        
        
        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
            $message="Option enregistrée avec succès !";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        } else {
            $message="Échec de l'enregistrement de l'option!";
            echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
        }
    }

    // Methode modifier (Update)
    public function modifier($connexion,$idOption) {
        // Préparer la requête SQL pour la mise à jour
        $requete = "UPDATE `option` SET LibOption = :libOption WHERE IdOption = :idOption";
        $stmt = $connexion->prepare($requete);
        // Lier les paramètres avec les valeurs
        $stmt->bindParam(':idOption', $idOption);
        $stmt->bindParam(':libOption', $this->libOption);

        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
          
            $message="Option modifiée avec succès ! ";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        } else {
           
            $message="Échec de la modification de l'option ";
            echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
        }
    }

    // Methode supprimer (Delete)
    public function supprimer($connexion,$idOption) {
        // Préparer la requête SQL pour la suppression
        $requete = "DELETE FROM `option` WHERE IdOption = :idOption";
        $stmt = $connexion->prepare($requete);
        // Lier le paramètre avec la valeur
        $stmt->bindParam(':idOption', $idOption);
        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
            $message="Option supprimée avec succès  !";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        } else {
            echo "Échec de la suppression de l'option.\n";
            $message="Échec de la suppression de l'option !";
            echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
        }
    }
}
