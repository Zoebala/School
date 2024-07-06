<section class="section1" id="apropos">
                <h2 class="italic white underline">Ajouter une Classe</h2>
                <?php
                    require("controllers/ClasseController.php");
                ?>
                <div class="apropos text-center">                  
                    
                    <form action="#apropos" method="post" >

                        <input type="text" class="rounded p-1 w-350 mt-2" maxlength="7" required  placeholder="Ex: 7e EB" name="txtClasse" id="txtClasse"> <br>
                        <button type="submit" class="rounded p-1 mt-1" name="btnAjoutClasse">Ajouter Classe</button>
                    </form>
                    

                  
                </div>
</section>