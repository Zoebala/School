
<section class="section2">
        <h2 class="italic white underline">Liste des Elèves</h2>  
        <?php
            if(isset($_GET["suppression"])){
                $message="Suppression Elève effectuée avec succès!";
                echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
                unset($_GET["suppression"]);
            }
            @require("controllers/EleveController.php");
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
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    $requete = "SELECT * FROM `eleve` as e JOIN `classe`as c ON e.IdClasse=c.IdClasse 
                    JOIN `option` as o ON e.IdOption=o.IdOption";
                    $resultat = $connexion->query($requete);
                    $i=1;
                    if ($resultat->rowCount() > 0) {
                        while ($ligne = $resultat->fetch()) {
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?=$ligne["LibClasse"]; ?></td>
                    <td><?=$ligne["LibOption"]; ?></td>
                    <td><?=$ligne["Nom"]." ".$ligne["Postnom"]." ".$ligne["Prenom"]; ?></td>
                    <td><?=$ligne["Matricule"]; ?></td>
                    <!-- <td>
                        
                    </td> -->
                    <td><?= $ligne["Adresse"]; ?></td>
                    <td>
                        <a href="Controllers/EleveController.php?DeleteId=<?= $ligne["Matricule"]; ?>" class="danger rounded">Supprimer</a>
                        <a href="Controllers/EleveController.php?UpdateId=<?= $ligne["Matricule"]; ?>" class="warning rounded">Modifier</a>
                    </td>
                </tr>
                <?php 
                    $i+=1;
                    }
                }
                ?>
            </table>

        </div>
</section>