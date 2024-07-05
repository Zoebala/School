<?php

class Classe {

    private $idClasse;
    private $libClasse;

    public function __construct($idClasse, $libClasse) {
        $this->idClasse = $idClasse;
        $this->libClasse = $libClasse;
    }

    public function getIdClasse() {
        return $this->idClasse;
    }

    public function setIdClasse($idClasse) {
        $this->idClasse = $idClasse;
    }

    public function getLibClasse() {
        return $this->libClasse;
    }

    public function setLibClasse($libClasse) {
        $this->libClasse = $libClasse;
    }

    // Methode enregistrer (Create)
    public function enregistrer($connexion) {
        // Préparer la requête SQL pour l'insertion
        $requete = "INSERT INTO Classe (LibClasse) VALUES (:libClasse)";
        $stmt = $connexion->prepare($requete);

        // Lier les paramètres avec les valeurs
        $stmt->bindParam(':libClasse', $this->libClasse);

        // Exécuter la requête et vérifier si elle réussit
        if ($stmt->execute()) {
            // Récupérer l'ID généré automatiquement pour la classe
            $this->idClasse = $connexion->lastInsertId();
            echo "Classe enregistrée avec succès ! ID: " . $this->idClasse . "\n";
        } else {
            echo "Échec de l'enregistrement de la classe.\n";
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
