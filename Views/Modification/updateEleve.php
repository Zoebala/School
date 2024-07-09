<section class="section1" id="apropos">
                <h2 class="italic white underline">Modification Elève</h2>
                <?php
                    require("controllers/EleveController.php");
                ?>
                <div class="apropos text-center">                  
                    
                    <form action="#apropos" method="post" >
                        <label for="classe" class="white">Classe :</label>
                        <select name="classe" class="w-150 rounded p-1 mt-2" id="classe">
                            <?php

                              foreach($Classes as $Classe){
                            ?>
                            <option value="<?=$Classe["IdClasse"]; ?>"><?=$Classe["LibClasse"];  ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <label for="option" class="white">Option :</label>
                        <select name="option" class="w-150 rounded p-1" id="option">
                            <?php

                            foreach($Options as $Option){
                            ?>
                            <option value="<?= $Option["IdOption"]; ?>"><?= $Option["LibOption"]; ?></option>
                            <?php
                                }
                            ?>
                        </select> <br>
                        <?php 
                            $matricule=$_GET["Matricule"]; 
                            $nom=$_GET["Nom"]; 
                            $postnom=$_GET["Postnom"]; 
                            $prenom=$_GET["Prenom"]; 
                            $genre=$_GET["Genre"]; 
                            $date=$_GET["Datenais"];
                            $adresse=$_GET["Adresse"];
                            $IdEleve=$_GET["IdEleve"];
                        ?>
                        <input type="text" name="matricule" value="<?= $matricule1 ?? $matricule;?>" class="p-1 rounded w-150 mt-2" placeholder="saisissez votre matricule" required>
                        <input type="text" name="nom" id="nom" value="<?=$nom1 ?? $nom;?>" class="p-1 rounded w-150" placeholder="saisissez votre nom" required>
                        <input type="text" name="postnom" value="<?=$postnom1 ?? $postnom;?>" id="postnom" class="p-1 rounded w-250" placeholder="saisissez votre postnom" required>
                        <input type="text" name="prenom" value="<?=$prenom1 ?? $prenom;?>" class="p-1 rounded w-250 mt-2" id="prenom" placeholder="saisissez votre prénom" required>
                        <input type="date" name="datenais" value="<?=$date1 ?? $date;?>" class="p-1 rounded w-250" id="datenais">
                        <input type="text" name="adresse" value="<?=$adresse1 ?? $adresse;?>" class="p-1 rounded w-250 mt-2" id="adresse" placeholder="Ex: 45, Av. mweneditu Q/Disengomoka" required>
                        <select name="genre" id="genre" class="p-1 rounded w-150 mt-1">
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select><br>
                        <button type="submit" class="rounded p-1 mt-2" value="<?= $IdEleve; ?>" name="btnUpdateEleve">Modifier Elève</button>
                    </form>
                    

                  
            </div>
</section>