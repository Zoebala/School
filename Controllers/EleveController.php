<?php
//Recherche de l'élève
if(isset($_GET["search"]) && $_GET["choix"]){
    session_start();
    require("../Models/Connexion.php");
    require("../Models/Eleve.class.php");
    switch($_GET["choix"]){
        case "option":
            $nom=strip_tags($_GET["search"]);
            $Eleve=new Eleve("","","","","","","","","");
            $_SESSION["eleve"]=$Eleve->rechercherParOption($connexion,$nom);
            // echo "<pre>";
            // print_r($_SESSION['eleve']);
            // echo "</pre>";die;
            if($_SESSION["eleve"]){
                header("location:../index.php?page=recherche#apropos");
                exit();
            }else{
                $trouver=false;                
                header("location:../index.php?trouve=$trouver&page=recherche#apropos");
                exit();               
            }
            

        break;
        case "nom":
            $nom=strip_tags($_GET["search"]);
            $Eleve=new Eleve("","","","","","","","","");
            $_SESSION["eleve"]=$Eleve->rechercherParNom($connexion,$nom);
            // echo "<pre>";
            // print_r($_SESSION['eleve']);
            // echo "</pre>";die;
            if($_SESSION["eleve"]){
                header("location:../index.php?page=recherche#apropos");
                exit();
            }else{
                $trouver=false;                
                header("location:../index.php?trouve=$trouver&page=recherche#apropos");
                exit();               
            }          
        break;
        case "classe":
            $nom=strip_tags($_GET["search"]);
            $Eleve=new Eleve("","","","","","","","","");
            $_SESSION["eleve"]=$Eleve->rechercherParClasse($connexion,$nom);
            if($_SESSION["eleve"]){
                header("location:../index.php?page=recherche#apropos");
                exit();
            }else{
                $trouver=false;                
                header("location:../index.php?trouve=$trouver&page=recherche#apropos");
                exit();               
            }
            
            
        break;
    }
}
// require("../Models/Connexion.php");
//chargement des classes et options sur le formulaire élève
if(!isset($_GET["DeleteId"]) && !isset($_GET["UpdateId"])){

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
   
    $Eleve1= new Eleve($matricule,$nom,$postnom,$prenom,$genre,$datenais,$adresse,$option,$classe);
    $Eleve1->enregistrer($connexion);
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

//Affichage Eleve à modifier
if(isset($_GET["UpdateId"])){

    require("../Models/Connexion.php");
    require("../Models/Eleve.class.php");
    $clef=$_GET["UpdateId"];
                              
    $requete="SELECT * FROM `eleve` as e JOIN `classe`as c ON e.IdClasse=c.IdClasse 
                    JOIN `option` as o ON e.IdOption=o.IdOption WHERE e.IdEleve=$clef";
    $resultat = $connexion->query($requete);
    $ligne = $resultat->fetch();

    $matricule=$ligne["Matricule"];
    $Nom=$ligne["Nom"];
    $postnom=$ligne["Postnom"];
    $prenom=$ligne["Prenom"];
    $genre=$ligne["Genre"];
    $date=$ligne["Datenais"];
    $adresse=$ligne["Adresse"];
    $IdEleve=$ligne["IdEleve"];
   

    header("Location:../index.php?Matricule=$matricule&Nom=$Nom&Postnom=$postnom&Prenom=$prenom&Genre=$genre&Datenais=$date&Adresse=$adresse&IdEleve=$IdEleve&page=updateEleve#apropos");
    exit();
}

//Modification proprement dite
if( isset($_POST["btnUpdateEleve"]) && isset($_POST['classe']) && !empty($_POST['classe'])
    && isset($_POST['option']) && !empty($_POST['option']) && isset($_POST["matricule"]) && !empty($_POST["matricule"])
    && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['postnom']) && !empty($_POST['postnom'])
    && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['genre']) && !empty($_POST['genre']) 
    && isset($_POST['datenais']) && !empty($_POST['datenais']) && isset($_POST['adresse']) && !empty($_POST["adresse"])
   ){
    $clef=$_POST["btnUpdateEleve"];       
    $classe1=htmlspecialchars($_POST['classe']);
    $option1=htmlspecialchars($_POST['option']);
    $matricule1=htmlspecialchars($_POST['matricule']);
    $nom1=htmlspecialchars($_POST['nom']);
    $postnom1=htmlspecialchars($_POST['postnom']);
    $prenom1=htmlspecialchars($_POST['prenom']);
    $genre1=htmlspecialchars($_POST['genre']);
    $datenais1=htmlspecialchars($_POST['datenais']);
    $adresse1=htmlspecialchars($_POST['adresse']);
   
    $Eleve= new Eleve($matricule1,$nom1,$postnom1,$prenom1,$genre1,$datenais1,$adresse1,$option1,$classe1);
    $Eleve->modifier($connexion,$clef);
    
}

