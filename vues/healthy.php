<?php
require_once ('../Controllers/categoryController.php');

class healthy
{
    public function showHelathy(){
        $cc1= new categoryController();
        $healthy = $cc1->healthy();
        ?>
        <head>
            <meta charset="UTF-8">
            <link href="../CSS/card.css" rel="stylesheet">
        </head>
        <div class="category-container">

            <center><h2 class="mt-1">Healthy</h2></center>

                <!-- col-3 le 3 specifie le width de la carte plus il est ptit plus la carte est ptite-->
        <div class="scrolling-wrapper row flex-row flex-nowrap">

        <?php

                foreach ($healthy as $value)
                {
                    ?>
                    <div class="col-3">
                        <div class="card card-block">
                            <img src="<?php echo $value['image']?>"><div style="padding-top: 20px;"><center><label><b><?php echo $value['titre']?></b></label></center><label style="padding-left: 40px;padding-right: 40px;"><?php echo substr($value['description'],0,59)?>... <a href="../Routes/recetteRoute.php?id=<?php echo $value['id']?>" target="_blank">Afficher plus</a></label></div>
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