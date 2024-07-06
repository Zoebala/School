<?php

// require("../Models/Connexion.php");
//chargement des classes et options sur le formulaire élève
if(!isset($_GET["DeleteId"])){

    $requete="SELECT * FROM `classe`";
    $resultat = $connexion->query($requete);
    $Classes = $resultat->fetchAll();
    
    $requete1="SELECT * FROM `option`";
    $resultat1 = $connexion->query($requete1);
    $Options = $resultat1->fetchAll();
}


// Enregistrement Elève
if( isset($_POST["btnAjoutEleve"]) && isset($_POST['classe']) && !empty($_POST['classe'])
    && isset($_POST['option']) && !empty($_POST['option']) && isset($_POST["matricule"]) && !empty($_POST["matricule"])
    && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['postnom']) && !empty($_POST['postnom'])
    && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['genre']) && !empty($_POST['genre']) 
    && isset($_POST['datenais']) && !empty($_POST['datenais']) && isset($_POST['adresse']) && !empty($_POST["adresse"])
   ){

    $classe=htmlspecialchars($_POST['classe']);
    $option=htmlspecialchars($_POST['option']);
    $matricule=htmlspecialchars($_POST['matricule']);
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $genre=htmlspecialchars($_POST['genre']);
    $datenais=htmlspecialchars($_POST['datenais']);
    $adresse=htmlspecialchars($_POST['adresse']);
   
    $Option= new Eleve($matricule,$nom,$postnom,$prenom,$genre,$datenais,$adresse,$option,$classe);
    $Option->enregistrer($connexion);
    
}


//Suppression d'un option
if(isset($_GET["DeleteId"])){
    require("../Models/Connexion.php");
    require("../Models/Eleve.class.php");
    $clef=$_GET["DeleteId"];
    $Eleve= new Eleve("","","","","","","","","");
    $Eleve->supprimer($connexion,$clef);
    
    header("Location:../index.php?suppression=$clef&page=eleve#apropos");
    exit();
}

