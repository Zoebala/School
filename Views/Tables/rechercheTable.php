
<section class="section2">
        <h2 class="italic white underline">Liste de la Recherche</h2>  
        <?php
            if(isset($_GET["suppression"])){
                $message="Suppression Elève effectuée avec succès!";
                echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
                unset($_GET["suppression"]);
            }
            // require("controllers/EleveController.php");
        ?>             
        <div style="display:flex; justify-content:center;">

            <table class="white" style="text-align:center;">
                <tr>
                    <th>#</th>
                    <th>Classe</th>
                    <th>Option</th>
                    <th>Noms</th>
                    <th>Matricule</th>
                    <!-- <th>Date Naissance</th> -->
                    <!-- <th>Adresse</th> -->
                    <th>Actions</th>
                </tr>
                <?php 
                    
                  
                    $resultat = $_SESSION["eleve"];
                    
                    $i=1;
                    if (!isset($_GET['trouve'])) {
                        foreach ($resultat as $r) {
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?=$r->LibClasse; ?></td>
                    <td><?=$r->LibOption; ?></td>
                    <td><?=$r->Nom." ".$r->Postnom." ".$r->Prenom; ?></td>
                    <td><?=$r->Matricule; ?></td>
                    <!-- <td>
                        
                    </td> -->
                    
                    <td>
                        <a href="Controllers/EleveController.php?DeleteId=<?= $r->IdEleve; ?>" class="danger rounded">Supprimer</a>
                        <a href="Controllers/EleveController.php?UpdateId=<?= $r->IdEleve; ?>" class="warning rounded">Modifier</a>
                    </td>
                </tr>
                <?php 
                    $i+=1;
                    }
                  
                }else{
                ?>
                    <tr>
                        <td colspan="6" class="italic">Aucune donnée trouvée</td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
</section>