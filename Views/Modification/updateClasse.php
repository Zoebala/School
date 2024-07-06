<section class="section1" id="apropos">
                <h2 class="italic white underline">Modification Option</h2>
                <?php
                    require("controllers/ClasseController.php");
                ?>
                <div class="apropos text-center">                  
                    
                    <form action="#apropos" method="post" >
                        <?php
                          $LibClasse=$_GET["LibClasse"];
                          $IdClasse=$_GET["IdClasse"];
                                
                        ?>                      
                            <input type="text" value="<?=$classe ?? $LibClasse; ?>" class="rounded p-1 w-350 mt-2" required maxlength="7"  placeholder="Ex: 7e EB" name="txtClasse" id="txtClasse"> <br>
                            <button type="submit" class="rounded p-1 mt-1" value="<?=$IdClasse; ?>" name="btnUpdateClasse">Modifier Classe</button>
                       
                    </form>
                    

                  
                </div>
</section>