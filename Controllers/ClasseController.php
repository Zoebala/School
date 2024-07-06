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