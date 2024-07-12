<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/ClasseStyle.css">
    <title>School</title>
</head>
<body>
    <?php 
       
        //inclusion des classes
        session_start();
        require("Models/Connexion.php"); 
        require("Models/Option.class.php");
        require("Models/Classe.class.php");
        require("Models/Eleve.class.php");
        require("controllers/EleveController.php");
    ?>
    <div class="container text-center">