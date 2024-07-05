<?php

// Informations de connexion à la base de données
$serveur = "localhost";
$nom_base = "school";
$utilisateur = "root";
$mot_de_passe = "";

// Essai de connexion à la base de données
try {
  $connexion = new PDO("mysql:host=$serveur;dbname=$nom_base", $utilisateur, $mot_de_passe);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connexion à la base de données réussie !\n";
} catch (PDOException $e) {
  // echo "Échec de la connexion à la base de données : " . $e->getMessage() . "\n";
  exit();
}

// // Exemple de requête SQL (facultatif)
// $requete = "SELECT * FROM ma_table";
// $resultat = $connexion->query($requete);

// if ($resultat->rowCount() > 0) {
//   // Traiter les résultats de la requête
//   while ($ligne = $resultat->fetch()) {
//     echo "ID: " . $ligne["id"] . " - Nom: " . $ligne["nom"] . "\n";
//   }
// } else {
//   echo "Aucune donnée trouvée.\n";
// }

// // Fermeture de la connexion à la base de données
// $connexion->close();

?>
