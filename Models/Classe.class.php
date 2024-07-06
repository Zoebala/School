<?php

class Classe {

 
    private $libClasse;

    public function __construct($libClasse) {
        $this->libClasse = $libClasse;
    }


    // Methode enregistrer (Create)
    public function enregistrer($connexion) {
        // Préparer la requête SQL pour l'insertion
        $requete = "INSERT INTO `classe` (LibClasse) VALUES (:libClasse)";
        $stmt = $connexion->prepare($requete);

        // Lier les paramètres avec les valeurs
        $stmt->bindParam(':libClasse', $this->libClasse);

        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
        
            $message="Classe enregistrée avec succès ! ";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        } else {
          
            $message="Échec de l'enregistrement de la classe. ! ";
            echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
            
        }
    }

    // Methode modifier (Update)
    public function modifier($connexion,$IdClasse) {
        // Préparer la requête SQL pour la mise à jour
        $requete = "UPDATE `classe` SET LibClasse = :libClasse WHERE IdClasse = :idClasse";
        $stmt = $connexion->prepare($requete);

        // Lier les paramètres avec les valeurs
        $stmt->bindParam(':idClasse', $IdClasse);
        $stmt->bindParam(':libClasse', $this->libClasse);

        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {

            $message="Classe modifiée avec succès !";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        } else {
           
            $message="Échec de la modification de la classe!";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        }
    }

    // Methode supprimer (Delete)
    public function supprimer($connexion,$IdClasse) {
        // Préparer la requête SQL pour la suppression
        $requete = "DELETE FROM `classe` WHERE IdClasse = :idClasse";
        $stmt = $connexion->prepare($requete);

        // Lier le paramètre avec la valeur
        $stmt->bindParam(':idClasse', $IdClasse);

        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
           
            $message="Classe supprimée avec succès !";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        } else {
         
            $message="Échec de la suppression de la classe!";
            echo "<p style='text-align:center; padding:10px; background-color:green; font-style:italic;'>".$message."</p>";
        }
    }
}
