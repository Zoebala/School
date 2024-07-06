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
    public function modifier($connexion) {
        // Préparer la requête SQL pour la mise à jour
        $requete = "UPDATE Classe SET LibClasse = :libClasse WHERE IdClasse = :idClasse";
        $stmt = $connexion->prepare($requete);

        // Lier les paramètres avec les valeurs
        $stmt->bindParam(':idClasse', $this->idClasse);
        $stmt->bindParam(':libClasse', $this->libClasse);

        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
            echo "Classe modifiée avec succès ! ID: " . $this->idClasse . "\n";
        } else {
            echo "Échec de la modification de la classe.\n";
        }
    }

    // Methode supprimer (Delete)
    public function supprimer($connexion) {
        // Préparer la requête SQL pour la suppression
        $requete = "DELETE FROM Classe WHERE IdClasse = :idClasse";
        $stmt = $connexion->prepare($requete);

        // Lier le paramètre avec la valeur
        $stmt->bindParam(':idClasse', $this->idClasse);

        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
            echo "Classe supprimée avec succès ! ID: " . $this->idClasse . "\n";
        } else {
            echo "Échec de la suppression de la classe.\n";
        }
    }
}
