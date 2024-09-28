<?php
require_once ('../Controllers/getFavorisController.php');

class recettesFavoris
{
    public function showFavoris(){
        session_start();
        $gfc=new getFavorisController();
        $mesfavoris= $gfc->getFav($_SESSION['id']);
        ?>
        <div id="abc" class="category-container" style="box-shadow: 0 0 0 0; border: none">
            <center><h2 id="cat" class="mt-1" >Favoris</h2></center>
            <div id="affichage" class="scrolling-wrapper row flex-row">
                <!-- col-3 le 3 specifie le width de la carte plus il est ptit plus la carte est ptite-->
                <?php
                foreach ($mesfavoris as $value)
                {
                    ?>
                    <div class="col-3">
                        <div class="card card-block" style="margin-bottom: 20px;">
                            <img src="<?php echo $value['image']?>"> <label class="titre"><b><?php echo $value['titre']?></b></label><label><?php echo substr($value['description'],0,59)?>... <a href="../Routes/recetteRoute.php?id=<?php echo $value['id']?>" target="_blank">Afficher plus</a></label>
                        </div>
                    </div>
                    <?php
                }


                ?>
            </div>
        </div>

<?php
    }

}