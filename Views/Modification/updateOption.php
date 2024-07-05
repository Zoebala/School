<section class="section1" id="apropos">
                <h2 class="italic white underline">Modification Option</h2>
                <?php
                    require("controllers/OptionController.php");
                ?>
                <div class="apropos text-center">                  
                    
                    <form action="#apropos" method="post" >
                        <?php
                          $Liboption=$_GET["LibOption"];
                          $IdOption=$_GET["IdOption"];
                                
                        ?>                      
                            <input type="text" value="<?=$option ?? $Liboption; ?>" class="rounded p-1 w-350 mt-2" required  placeholder="Ex: Scientifique" name="txtOption" id="TextOption"> <br>
                            <button type="submit" class="rounded p-1 mt-1" value="<?=$IdOption; ?>" name="btnUpdate">Modifier Option</button>
                       
                    </form>
                    

                  
                </div>
</section>