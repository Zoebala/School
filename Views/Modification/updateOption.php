<section class="section1" id="apropos">
                <h2 class="italic white underline">Modification Option</h2>
                <div class="apropos text-center">                  
                    
                    <form action="#apropos" method="post" >
                        <?php
                          
                                // $clef=$_GET["IdOption"];
                              
                                // $requete="SELECT LibOption FROM `option` WHERE IdOption=$Clef";
                                // $resultat = $connexion->query($requete);
                                // $ligne = $resultat->fetch();
                        ?>                      
                            <input type="text" value="<?='ici...'; ?>" class="rounded p-1 w-350 mt-2" required  placeholder="Ex: Scientifique" name="txtOption" id="TextOption"> <br>
                            <button type="submit" class="rounded p-1 mt-1">Modifier Option</button>
                       
                    </form>
                    

                        <?php
                            require("controllers/OptionController.php");
                        ?>
                  
                </div>
</section>