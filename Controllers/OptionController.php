<?php



if(isset($_POST['txtOption']) && !empty($_POST['txtOption'])){
    // Enregistrement de l'option

    $libOption=strip_tags($_POST['txtOption']);

    $Option= new Option($libOption);
    $Option->enregistrer($connexion);
    
}

//Suppression d'un option
if(isset($_GET["DeleteId"])){
    require("../Models/Connexion.php");
    require("../Models/Option.class.php");
    $clef=$_GET["DeleteId"];
    $Option1= new Option("");
    $Option1->supprimer($connexion,$clef);

    header("Location:../index.php?page=option#apropos&suppression=$clef");
    exit();
}