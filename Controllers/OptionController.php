<?php



if( isset($_POST["btnAjout"]) && isset($_POST['txtOption']) && !empty($_POST['txtOption'])){
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
    
    header("Location:../index.php?suppression=$clef&page=option#apropos");
    exit();
}
//Affichage option à modifier
if(isset($_GET["UpdateId"])){
    require("../Models/Connexion.php");
    require("../Models/Option.class.php");
    $clef=$_GET["UpdateId"];
                              
    $requete="SELECT * FROM `option` WHERE IdOption=$clef";
    $resultat = $connexion->query($requete);
    $ligne = $resultat->fetchAll();
    $Liboption=$ligne[0]["LibOption"];
    $IdOption=$ligne[0]["IdOption"];

    header("Location:../index.php?LibOption=$Liboption&IdOption=$IdOption&page=updateOption#apropos");
    exit();
}

//Modification proprement dite
if(isset($_POST["btnUpdate"]) && isset($_POST["txtOption"]) && !empty($_POST["txtOption"])){

    $option=$_POST["txtOption"];
    $clef=$_POST["btnUpdate"];
    $Option=new Option($option);
    $Option->modifier($connexion,$clef);
    
}