        <?php 
            require("Views/portions/entete.php");
        ?>
        <!-- debut header -->
        <header>
            
           <?php 
             // inclusion de la barre de navigation
             require("Views/portions/navbar.php"); 

             // inclusion de la bannière
             require("Views/portions/banniere.php"); 
           ?>
           
        </header>
        <!-- Fin header-->

        <!-- début main -->
        <main>


                <!-- Routage des pages -->
                       
                <?php
               
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "index":
                            require("Views/portions/about.php"); //apropos
                    
                            require("Views/portions/option.php"); 
                        break;
                        case "option":
                            require("Views/Insertions/formOption.php"); //formOption
                            require("Views/Tables/optionTable.php");
                        break;
                        case "updateOption":
                           
                            require("Views/Modification/updateOption.php"); //formOption
                            require("Views/Tables/optionTable.php");
                        break;
                        case "classe":
                            require("Views/Insertions/formClasse.php"); //formulaire classe
                            require("Views/Tables/classeTable.php");
                        break;
                        case "updateClasse":
                            require("Views/Modification/updateClasse.php"); //formulaire modification
                            require("Views/Tables/classeTable.php");
                        break;
                        default:                        
                            require("Views/portions/about.php"); //apropos
                    
                            require("Views/portions/option.php"); 

                    }
                }else{
                    require("Views/portions/about.php"); //apropos
                    
                    require("Views/portions/option.php");  
                }

              

                ?>           
              


            

            <!-- début actualités -->            
            <?php
                require_once("Views/portions/article.php"); 
            ?>
            <!-- fin actualités -->
        </main>
        <!-- fin main -->

        <!-- début footer -->
        <?php
            require_once("Views/portions/footer.php"); 
        ?>
    
