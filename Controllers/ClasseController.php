<?php

if( isset($_POST["btnAjoutClasse"]) && isset($_POST['txtClasse']) && !empty($_POST['txtClasse'])){
    // Enregistrement de l'option

    $LibClasse=strip_tags($_POST['txtClasse']);

    $Classe= new Classe($LibClasse);
    $Classe->enregistrer($connexion);
    
}