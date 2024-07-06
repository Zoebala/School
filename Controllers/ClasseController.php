<?php

// Enregistrement de l'option
if( isset($_POST["btnAjoutClasse"]) && isset($_POST['txtClasse']) && !empty($_POST['txtClasse'])){

    $LibClasse=strip_tags($_POST['txtClasse']);

    $Classe= new Classe($LibClasse);
    $Classe->enregistrer($connexion);
    
}


//Suppression d'un option
if(isset($_GET["DeleteId"])){
    require("../Models/Connexion.php");
    require("../Models/Classe.class.php");
    $clef=$_GET["DeleteId"];
    $Classe= new Classe("");
    $Classe->supprimer($connexion,$clef);
    
    header("Location:../index.php?suppression=$clef&page=classe#apropos");
    exit();
}


//Affichage option à modifier
if(isset($_GET["UpdateId"])){
    require("../Models/Connexion.php");
    require("../Models/Classe.class.php");
    $clef=$_GET["UpdateId"];
                              
    $requete="SELECT * FROM `classe` WHERE IdClasse=$clef";
    $resultat = $connexion->query($requete);
    $ligne = $resultat->fetchAll();
    $LibClasse=$ligne[0]["LibClasse"];
    $IdClasse=$ligne[0]["IdClasse"];

    header("Location:../index.php?LibClasse=$LibClasse&IdClasse=$IdClasse&page=updateClasse#apropos");
    exit();
}

//Modification proprement dite
if(isset($_POST["btnUpdateClasse"]) && isset($_POST["txtClasse"]) && !empty($_POST["txtClasse"])){

    $classe=$_POST["txtClasse"];
    $clef=$_POST["btnUpdateClasse"];
    $Classe=new Classe($classe);
    $Classe->modifier($connexion,$clef);
    
}