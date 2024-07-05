<section class="section1" id="apropos">
                <h2 class="italic white underline">Ajouter une Option</h2>
                <div class="apropos text-center">                  
                    
                    <form action="#apropos" method="post" >

                        <input type="text" class="rounded p-1 w-350 mt-2" required  placeholder="Ex: Scientifique" name="txtOption" id="TextOption"> <br>
                        <button type="submit" class="rounded p-1 mt-1">Ajouter Option</button>
                    </form>
                    

                        <?php
                            require("controllers/OptionController.php");
                        ?>
                  
                </div>
</section>