<?php
require_once ('../Controllers/fetesController.php');
require_once ('../Controllers/categoryController.php');
require_once ('../Controllers/getFetesController.php');

class fetes
{
    public function showFetes(){
        $cc1= new categoryController();
        $fc=new getFetesController();
        $fetes=$fc->getAllF();

        ?>
        <head>
            <meta charset="UTF-8">
            <link href="../CSS/card.css" rel="stylesheet">
            <script src="../jQuery/jquery-3.6.0.js"></script>

            <script>

            </script>
        </head>
        <?php
        foreach ($fetes as $f)
        {
            $mesPlats = $cc1->fetes($f['id']);
            ?>
        <div class="category-container">

            <center><h2 class="mt-1"><?php echo $f['titre']?></h2></center>

            <div class="scrolling-wrapper row flex-row flex-nowrap">
                <!-- col-3 le 3 specifie le width de la carte plus il est ptit plus la carte est ptite-->
                <?php
                foreach ($mesPlats as $value)
                {
                    ?>
                    <div class="col-3">
                        <div class="card card-block">
                            <img src="<?php echo $value['image']?>"> <label><b><?php echo $value['titre']?></b></label><label><?php echo substr($value['description'],0,59)?>... <a href="../Routes/recetteRoute.php?id=<?php echo $value['id']?>" target="_blank">Afficher plus</a></label>
                        </div>
                    </div>
                    <?php
                }


                ?>
            </div>
        </div>
            <?php
        }


        ?>

        <?php
    }


}