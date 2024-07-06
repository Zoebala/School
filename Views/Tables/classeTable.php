
<section class="section2">
        <h2 class="italic white underline">Liste des Classes</h2>  
        <?php
            if(isset($_GET["suppression"])){
                $message="Suppression option effectuée avec succès!";
                echo "<p style='text-align:center; padding:10px; background-color:red; font-style:italic;'>".$message."</p>";
                unset($_GET["suppression"]);
            }
            // require("controllers/OptionController.php");
        ?>             
        <div style="display:flex; justify-content:center;">

            <table class="white" style="text-align:center;">
                <tr>
                    <th>#</th>
                    <th>Classe</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    $requete = "SELECT * FROM `classe`";
                    $resultat = $connexion->query($requete);
                    $i=1;
                    if ($resultat->rowCount() > 0) {
                        while ($ligne = $resultat->fetch()) {
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?=$ligne["LibClasse"]; ?></td>
                    <td>
                        <a href="Controllers/OptionController.php?DeleteId=<?= $ligne["IdClasse"] ?>" class="danger inline rounded">Supprimer</a>
                        <a href="Controllers/OptionController.php?UpdateId=<?= $ligne["IdClasse"] ?>" class="warning inline rounded">Modifier</a>
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